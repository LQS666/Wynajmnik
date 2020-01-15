<?php

namespace App\Http\View\Composers;

use App\Category;
use App\Filter;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductComposer
{
    protected $user;

    protected $product;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        if ($data = $view->getData()) {
            if (!is_null($data['product'])) {
                $this->product = $data['product'];
            }
        }

        $filters = Filter::with('values')->where('visible', true)->get();

        $categories = Category::maincategories()->with([
            'subcategories' => function ($query) {
                $query->where('visible', true);
            }
        ])
        ->where('visible', true)
        ->get();

        if (!empty($this->product)) {
            $checked = [
                'categories' => [],
                'filters' => [],
                'filterValues' => [],
            ];

            if (!empty($this->product->categories)) {
                foreach ($this->product->categories as $category) {
                    $checked['categories'][] = $category->id;
                }
            }

            if (!empty($this->product->filterValues)) {
                foreach ($this->product->filterValues as $filterValue) {
                    $checked['filterValues'][] = $filterValue->id;
                    if (!in_array($filterValue->filter->id, $checked['filters'])) {
                        $checked['filters'][] = $filterValue->filter->id;
                    }
                }
            }
        }

        $view->with('filters', $filters);
        $view->with('categories', $categories);
        $view->with('checked', isset($checked) ? $checked : []);
    }
}
