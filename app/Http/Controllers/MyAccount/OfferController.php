<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Offer;

class OfferController extends Controller
{
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

        if (!is_null($offer->accepted_at)) {
            return redirect()->back()
                             ->with('sweet.info', trans('message.offerAlreadyAccepted'));
        }

        $offer->update([
            'accepted_at' => time()
        ]);

        // TODO fire event

        return redirect()->back()
                         ->with('sweet.success', trans('message.offerAccepted'));
    }

    public function reject(Offer $offer)
    {
        $this->authorize('areYouOwner', $offer->product);

        if (!is_null($offer->rejected_at)) {
            return redirect()->back()
                             ->with('sweet.info', trans('message.offerAlreadyRejected'));
        }

        $offer->update([
            'rejected_at' => time()
        ]);

        // TODO fire event

        return redirect()->back()
                         ->with('sweet.success', trans('message.offerRejected'));
    }

    public function cancel(Offer $offer)
    {
        $this->authorize('areYouOwner', $offer);

        if (!is_null($offer->deleted_at)) {
            return redirect()->back()
                             ->with('sweet.info', trans('message.offerAlreadyCanceled'));
        }

        if (!is_null($offer->accepted_at) || !is_null($offer->rejected_at)) {
            return redirect()->back()
                             ->with('sweet.info', trans('message.offerAlreadyHandled'));
        }

        $offer->delete();

        return redirect()->back()
                         ->with('sweet.success', trans('message.offerCanceled'));
    }
}
