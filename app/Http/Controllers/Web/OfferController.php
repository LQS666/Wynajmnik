<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOffer;
use App\Offer;
use App\Product;
use Illuminate\Support\Arr;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Product $product, StoreOffer $request)
    {
        $validated = $request->validated();

        $this->authorize('!areYouOwner', $product);

        // TODO CHECK DATES VALUES

        $offer = Offer::create(Arr::add($validated, 'user_id', $request->user()->id));

        // TODO send email by event

        return redirect()->back()
                         ->with('sweet.success', trans('message.offerCreated'));
    }
}
