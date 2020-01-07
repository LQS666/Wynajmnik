<?php

namespace App\Http\View\Composers\Web;

use App\Category;
use App\Filter;
use App\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class OffersComposer
{
    private $category;

    public function compose(View $view) {
        if ($data = $view->getData()) {
            if (!is_null($data['category'])) {
                $this->category = $data['category'];
            }
        }

        ////////////////////////////////////////////////////////////////////////////////////

        $categories = $current = Category::maincategories()->with('subcategories')->get();

        if (!is_null($this->category)) {
            $current = Category::maincategories($this->category->id)->with('subcategories')->get();
        }

        ////////////////////////////////////////////////////////////////////////////////////

        $filters = Filter::with('values')->where('visible', '=', true)->get();

        ////////////////////////////////////////////////////////////////////////////////////

        if (!is_null($this->category)) {
            $category = $this->category;
            $products = Product::whereHas('categories', function(Builder $query) use ($category) {
                                    $query->where('categories.id', $category->id);
                                })
                                ->where('visible', true)
                                ->orderBy('premium')
                                ->orderBy('created_at')
                                ->paginate(25);
        } else {
            $products = Product::where('visible', true)
                                ->orderBy('premium')
                                ->orderBy('created_at')
                                ->paginate(25);
        }

        ////////////////////////////////////////////////////////////////////////////////////

        $view->with([
            'categories' => $categories,
            'current' => $current,
            'filters' => $filters,
            'products' => $products
        ]);
    }
}
