<?php

namespace App\Http\View\Composers\Admin;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesComposer
{
    protected $user;

    private $category;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        if ($data = $view->getData()) {
            if (!is_null($data['category'])) {
                $this->category = $data['category'];
            }
        }

        $categories = Category::with('subcategories')
            ->maincategories(isset($this->category) ? $this->category['id'] : null)
            ->paginate(10);

        $view->with('categories', $categories);
    }
}
