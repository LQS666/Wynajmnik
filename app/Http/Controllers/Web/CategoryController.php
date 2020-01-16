<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Category $category = null)
    {
        // Values [$categories, $current, $filters, $products] bound to view in ViewServiceProvider
        return view('web.products', [
            'category' => $category
        ]);
    }
}
