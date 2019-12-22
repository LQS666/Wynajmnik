<?php

namespace App\Http\View\Composers;

use App\Category;
use App\Filter;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $filters = Filter::with('values')->where('visible', '=', true)->get();
        $categories = Category::maincategories()->with('subcategories')->get();

        $view->with('filters', $filters);
        $view->with('categories', $categories);
    }
}
