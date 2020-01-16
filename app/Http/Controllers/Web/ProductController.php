<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    //public function index(Category $category = null)
    //{
    //    // Values [$categories, $current, $filters, $products] bound to view in ViewServiceProvider
    //    return view('web.products', [
    //        'category' => $category
    //    ]);
    //}

    //public function offer(Category $category, Product $product)
    //{
    //    return view('web.product', [
    //        'category' => $category,
    //        'product' => $product
    //    ]);
    //}

    public function index()
    {
        // Values [$categories, $current, $filters, $products] bound to view in ViewServiceProvider
        return view('web.products');
    }

    public function show(Product $product)
    {
        return view('web.product', [
            'product' => $product
        ]);
    }

    public function category(Category $category, Product $product)
    {
        return view('web.product', [
            'category' => $category,
            'product' => $product
        ]);
    }
}
