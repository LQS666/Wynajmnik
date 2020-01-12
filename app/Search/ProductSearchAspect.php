<?php

namespace App\Search;

use App\Product;
use Illuminate\Support\Collection;
use Spatie\Searchable\SearchAspect;

class ProductSearchAspect extends SearchAspect
{
    public static $searchType = 'Product';

    public function getResults(string $term): Collection
    {
        return Product::query()
            ->where('name', 'LIKE', "%{$term}%")
            ->orWhereHas('categories', function ($query) use ($term) {
                $query->where('name', 'LIKE', "%{$term}%");
            })
            ->orWhereHas('filterValues', function ($query) use ($term) {
                $query->where('value', 'LIKE', "%{$term}%");
            })
            ->get();
    }
}
