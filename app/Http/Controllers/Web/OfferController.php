<?php

namespace App\Http\Controllers\Web;

use App\Events\NewOfferNotification;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOffer;
use App\Offer;
use App\Product;
use App\Services\OfferService;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
        $this->middleware('verified');
    }

    public function store(Product $product, StoreOffer $request)
    {
        $this->authorize('!areYouOwner', $product);

        $validated = $request->validated();
        $validated['product_id'] = $product->id;
        $validated['user_id'] = $request->user()->id;

        try
        {
            OfferService::create($validated);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('sweet.error', trans('message.' . $e->getMessage()));
        }

        $offer = Offer::create($validated);

        event(new NewOfferNotification($offer));

        return redirect()->back()
                ->with('sweet.success', trans('message.offerSend'));
    }
}
