<?php

namespace App\Http\View\Composers;

use App\Offer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OffersComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $offers = Offer::whereHas('product', function (Builder $query) {
            $query->user(1);
        })->get();

        $view->with('offers', $offers);
    }
}
