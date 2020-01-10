<?php

namespace App\Services;

use App\Product;
use App\ProductPicture;
use Illuminate\Support\Facades\Auth;

final class ProductService
{
    public static function storeImages(Product $product, array $pictures)
    {
        ImageHandlerService::storeRelationshipImages($product, ProductPicture::class, $pictures);
    }

    public static function syncCategories(Product $product, array $categories)
    {
        $product->categories()->sync($categories);
    }

    public static function syncFilters(Product $product, array $filters)
    {
        $product->filterValues()->sync($filters);
    }

    public static function store(array $validated)
    {
        $product = new Product();
        $product->fill(array_merge($validated, [
            'user_id' => Auth::id(),
            'user_address_id' => $validated['address']
        ]));
        $product->save();

        self::syncCategories($product, [
            $validated['category'],
            $validated['subcategory']
        ]);

        if (isset($validated['filters']) && is_array($validated['filters'])) {
            $validated['filters'] = array_flip($validated['filters']);
            $validated['filters'] = array_map(function() {
                return ['visible' => true];
            }, $validated['filters']);

            self::syncFilters($product, $validated['filters']);
        }

        if (isset($validated['pictures']) && is_array($validated['pictures'])) {
            self::storeImages($product, $validated['pictures']);
        }
    }

    public static function update(Product $product, array $validated)
    {
        $product->update($validated);

        if (isset($validated['pictures']) && is_array($validated['pictures'])) {
            self::storeImages($product, $validated['pictures']);
        }
    }

    public static function destroy(Product $product)
    {
        $product->delete(); // Fire event on deleting to delete images from storage
    }

    private function __construct() {}
}
