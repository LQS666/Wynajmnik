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

        $categories = $current = Category::maincategories()
            ->visible()
            ->get();

        if (isset($this->category)) {
            $current = Category::with(['subcategories' => function ($query) {
                $query->visible();
            }])
            ->maincategories(
                isset($this->category) ?
                    (empty($this->category->sub) ? $this->category->id : $this->category->sub)
                        : null
            )
            ->visible()
            ->get();
        }

        ////////////////////////////////////////////////////////////////////////////////////

        $filters = Filter::with('values')
            ->visible();

        if (isset($this->category)) {
            $filters = $filters->whereHas('categories', function(Builder $query) {
                $query->where('categories.id', $this->category->id);
            });
        }

        $filters = $filters->get();

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

        if (!is_null($this->parameters['filter'])) {
            foreach ($this->parameters['filter'] as $filter) {
                if (!is_array($filter)) {
                    continue;
                }
                $products = $products->whereHas('filterValues', function (Builder $query) use ($filter) {
                    $query->whereIn('filter_values.id', array_map('intval', $filter));
                });
            }
        }

        $products = $products->paginate(24);

        ////////////////////////////////////////////////////////////////////////////////////

        $view->with([
            'categories' => $categories,
            'current' => $current,
            'filters' => $filters,
            'products' => $products,
            'parameters' => $this->parameters,
        ]);
    }
}
