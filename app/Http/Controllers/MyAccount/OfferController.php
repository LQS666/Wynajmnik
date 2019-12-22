<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOffer;
use App\Http\Requests\UpdateOffer;
use App\Offer;
use App\Product;
use Illuminate\Support\Arr;

class OfferController extends Controller
{
    public function index()
    {
        // Values [$products] bound to view in ViewServiceProvider
        return view('my-account.offers');
    }

    public function store(StoreOffer $request)
    {
        $validated = $request->validated();

        $this->authorize('add-offer', Product::find($validated->product_id));

        $offer = new Offer();
        $offer->fill(Arr::add($validated, 'user_id', $request->user()->id));
        $offer->save();

        // TODO send email by event
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
