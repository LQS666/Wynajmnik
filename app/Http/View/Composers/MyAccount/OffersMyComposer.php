<?php

namespace App\Http\View\Composers\MyAccount;

use App\Offer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OffersMyComposer
{
    protected $user;

    protected $parm = [];

    public function __construct(Request $request) {
        $this->user = $request->user();

        if (in_array($request->input('status'), ['accepted', 'rejected', 'waiting', 'cancelled', null])) {
            $this->parm['status'] = $request->input('status');
        }

        if (is_numeric($request->input('product'))) {
            $this->parm['product'] = (int) $request->input('product');
        }
    }

    public function compose(View $view) {
        $offers = Offer::user($this->user->id)
            ->orderBy('created_at', 'desc');

        if (isset($this->parm['product'])) {
            $offers = $offers->whereHas('product', function(Builder $query) {
                $query->where('id', $this->parm['product']);
            });
        }

        if ($this->parm['status'] == 'accepted') {
            $offers = $offers->accepted();
        }

        if ($this->parm['status'] == 'rejected') {
            $offers = $offers->rejected();
        }

        if ($this->parm['status'] == 'waiting') {
            $offers = $offers->unhandled();
        }

        if ($this->parm['status'] == 'cancelled') {
            $offers = $offers->withTrashed()
                ->cancelled();
        }

        if (!isset($this->parm['status'])) {
            $offers = $offers->withTrashed();
        }

        $view->with('offers', $offers->paginate(10));
    }
}
