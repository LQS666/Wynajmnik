<?php

namespace App\Http\View\Composers\Admin;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $categories = Category::maincategories()
                              ->with('subcategories')
                              ->get();

        $view->with('categories', $categories);
    }
}
