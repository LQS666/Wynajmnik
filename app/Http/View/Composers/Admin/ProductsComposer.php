<?php

namespace App\Http\View\Composers\Admin;

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
        $products = Product::orderBy('created_at', 'desc')
            ->paginate(10);

        $view->with('products', $products);
    }
}
