<?php

namespace App\Http\View\Composers\MyAccount;

use App\Offer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OffersForeignComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $offers = Offer::user($this->user)->withTrashed()
                                          ->orderBy('created_at', 'desc')
                                          ->paginate(10);

        $view->with('offers', $offers);
    }
}