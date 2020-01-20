<?php

namespace App\Http\View\Composers\Web;

use App\Category;
use App\Filter;
use App\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductsComposer
{
    private $category;

    private $parameters = [
        'filter' => null
    ];

    public function __construct(Request $request) {
        if (!empty($request->input('filter')) && is_array($request->input('filter'))) {
            $this->parameters['filter'] = $request->input('filter');
        }
    }

    public function compose(View $view) {
        if ($data = $view->getData()) {
            if (!is_null($data['category'])) {
                $this->category = $data['category'];
            }
        }

        ////////////////////////////////////////////////////////////////////////////////////

        $categories = Category::with(['subcategories' => function ($query) {
            $query->visible();
        }])
        ->maincategories(
            isset($this->category) ?
                (empty($this->category->sub) ? $this->category->id : $this->category->sub)
                    : null)
        ->visible()
        ->get();

        ////////////////////////////////////////////////////////////////////////////////////

        $filters = Filter::with('values')
            ->visible()
            ->get();

        ////////////////////////////////////////////////////////////////////////////////////

        $products = Product::with('filterValues')
            ->visible()
            ->orderBy('premium')
            ->orderBy('created_at');

        if (isset($this->category)) {
            $products = $products->whereHas('categories', function (Builder $query) {
                $query->where('categories.id', $this->category->id);
            });
        }

        if (!is_null($this->parameters['filter'])) { // TODO optimize this query by Laravel Eloquent
            foreach ($this->parameters['filter'] as $filter) {
                $products = $products->whereHas('filterValues', function (Builder $query) use ($filter) {
                    $query->where('filter_values.id', $filter);
                });
            }
        }

        $products = $products->paginate(24);

        ////////////////////////////////////////////////////////////////////////////////////

        $view->with([
            'categories' => $categories,
            'filters' => $filters,
            'products' => $products,
            'parameters' => $this->parameters,
        ]);
    }
}
