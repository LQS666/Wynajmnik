<?php

namespace App\Http\Controllers\MyAccount;

use App\Events\AcceptedOfferNotification;
use App\Events\ContactOfferNotification;
use App\Events\RejectedOfferNotification;
use App\Http\Controllers\Controller;
use App\Offer;
use App\Services\OfferService;
use App\Services\PointService;

class OfferController extends Controller
{
    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
    }

    public function showMy()
    {
        // Values [$offers] bound to view in ViewServiceProvider
        return view('my-account.offers-my');
    }

    public function showForeign()
    {
        // Values [$offers] bound to view in ViewServiceProvider
        return view('my-account.offers-foreign');
    }

    public function accept(Offer $offer)
    {
        $this->authorize('areYouOwner', $offer->product);

        try
        {
            OfferService::accept($offer);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('sweet.error', trans('message.' . $e->getMessage()));
        }

        ########################################

        $to_check = [
            PointService::ACCEPT
        ];

        if (!empty($to_check) && !PointService::checkIfEnough($to_check)) {
            return redirect()->back()
                             ->with('sweet.error', trans('message.notEnoughPoints'));
        }

        ########################################

        $offer->update([
            'accepted_at' => time()
        ]);

        if (!empty($to_check)) {
            foreach ($to_check as $mode) {
                PointService::makeAnyTransaction($mode);
            }
        }

        event(new AcceptedOfferNotification($offer));
        event(new ContactOfferNotification($offer));

        return redirect()->back()
            ->with('sweet.success', trans('message.offerAccepted'));
    }

    public function reject(Offer $offer)
    {
        $this->authorize('areYouOwner', $offer->product);

        try
        {
            OfferService::reject($offer);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('sweet.error', trans('message.' . $e->getMessage()));
        }

        if ($offer['isAccepted']) {
            PointService::makeAnyTransaction(PointService::ACCEPT_REFUND);
        }

        $offer->update([
            'accepted_at' => null,
            'rejected_at' => time()
        ]);

        event(new RejectedOfferNotification($offer));

        return redirect()->back()
            ->with('sweet.success', trans('message.offerRejected'));
    }

    public function destroy(Offer $offer)
    {
        $this->authorize('areYouOwner', $offer);

        try
        {
            OfferService::cancel($offer);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('sweet.error', trans('message.' . $e->getMessage()));
        }

        $offer->delete();

        return redirect()->back()
            ->with('sweet.success', trans('message.offerCanceled'));
    }
}
