<?php

namespace App\Http\View\Composers\MyAccount;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductsComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $products = Product::user($this->user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $view->with('products', $products);
    }
}
