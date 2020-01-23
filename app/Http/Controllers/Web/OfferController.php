<?php

namespace App\Http\Controllers\Web;

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
            // TODO send email by event

            return redirect()->back()
                ->with('sweet.error', trans('message.' . $e->getMessage()));
        }

        Offer::create($validated);

        // TODO send email by event

        return redirect()->back()
                ->with('sweet.success', trans('message.offerSend'));
    }
}
