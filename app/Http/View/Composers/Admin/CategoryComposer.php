<?php

namespace App\Http\View\Composers\Admin;

use App\Filter;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryComposer
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

        $filters = Filter::all();

        $view->with('filters', $filters);
    }
}
