<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Offer;
use App\Services\OfferService;

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

        $offer->update([
            'accepted_at' => time()
        ]);

        // TODO send mail

        return redirect()->back()
            ->with('sweet.error', trans('message.offerAccepted'));
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

        $offer->update([
            'rejected_at' => time()
        ]);

        // TODO send mail

        return redirect()->back()
            ->with('sweet.error', trans('message.offerRejected'));
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
            ->with('sweet.error', trans('message.offerCanceled'));
    }
}
