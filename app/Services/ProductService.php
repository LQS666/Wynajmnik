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
            self::syncFilters($product, $validated['filters']);
        }

        if (isset($validated['pictures']) && is_array($validated['pictures'])) {
            self::storeImages($product, $validated['pictures']);
        }
    }

    public static function update(Product $product, array $validated)
    {
        if (!isset($validated['visible'])) {
            $validated['visible'] = false;
        }

        $product->update($validated);

        self::syncCategories($product, [
            $validated['category'],
            $validated['subcategory']
        ]);

        if (isset($validated['filters']) && is_array($validated['filters'])) {
            self::syncFilters($product, $validated['filters']);
        }

        if (isset($validated['pictures']) && is_array($validated['pictures'])) {
            self::storeImages($product, $validated['pictures']);
        }
    }

    public static function destroy(Product $product)
    {
        if (count($product->images) > 0) {
            foreach ($product->images as $image) {
                $image->delete();
            }
        }
        $product->categories()->detach();
        $product->filterValues()->detach();
        $product->delete();
    }

    private function __construct() {}
}
