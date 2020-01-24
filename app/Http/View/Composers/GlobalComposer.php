<?php

namespace App\Http\View\Composers;

use App\Offer;
use App\Product;
use App\Site;
use App\UserAddress;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GlobalComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $sites = Site::orderBy('created_at', 'desc')
                     ->get();

        if ($this->user && !$this->user->admin) {
            $counters = [
                'my-products' => Product::user($this->user->id)->count(),
                'my-offers' => Offer::user($this->user->id)->count(),
                'my-addresses' => UserAddress::user($this->user->id)->count(),
                'foreign-offers' => Offer::whereHas('product', function (Builder $query) {
                    $query->user($this->user->id);
                })
                ->count(),
            ];
        }

        $view->with([
            'user' => $this->user,
            'sites' => $sites,
            'counters' => isset($counters) ? $counters : [],
        ]);
    }
}
