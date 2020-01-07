<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class OfferController extends Controller
{
    public function index(Category $category = null)
    {
        // Values [$categories, $current, $filters, $products] bound to view in ViewServiceProvider
        return view('web.offers', [
            'category' => $category
        ]);
    }

    public function offer(Category $category, Product $product)
    {
        return view('web.offer', [
            'category' => $category,
            'product' => $product
        ]);
    }
}
