<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOffer;
use App\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        // Values [$products] bound to view in ViewServiceProvider
        return view('my-account.offers');
    }

    public function update(UpdateOffer $request, Offer $offer)
    {
        $this->authorize('update-this', $offer->product);

        $offer->update($request->validated());

        // TODO fire event

        return redirect()->back()
                         ->with('sweet.success', trans('message.addressUpdated'));
    }
}
