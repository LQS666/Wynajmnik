<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Product;
use App\ProductPicture;
use App\Services\ImageHandlerService;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    use RedirectsUsers;

    protected $redirectTo = '/my-account/products';

    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
    }

    public function index()
    {
        // Values [$products] bound to view in ViewServiceProvider
        return view('my-account.products');
    }

    public function new() {
        // Values [$categories, $filters] bound to view in ViewServiceProvider
        return view('my-account.product-new');
    }

    public function store(StoreProduct $request)
    {
        $validated = $request->validated();

        $product = new Product();
        $product->fill(Arr::add($validated, 'user_id', $request->user()->id));
        $product->save();

        if (isset($validated['pictures']) && is_array($validated['pictures'])) {
            ImageHandlerService::storeRelationshipImages($product, ProductPicture::class, $validated['pictures']);
        }

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.productAdded'));
    }

    public function edit(Product $product)
    {
        // Values [$categories, $filters] bound to view in ViewServiceProvider
        $this->authorize('update-this', $product);

        return view('my-account.product-edit', [
            'product' => $product
        ]);
    }

    public function update(StoreProduct $request, Product $product)
    {
        $this->authorize('update-this', $product);

        $validated = $request->validated();

        $product->update($validated);

        if (isset($validated['pictures']) && is_array($validated['pictures'])) {
            ImageHandlerService::storeRelationshipImages($product, ProductPicture::class, $validated['pictures']);
        }

        return redirect()->back()
                         ->with('sweet.success', trans('message.addressUpdated'));
    }

    public function destroy(Product $product)
    {
        $this->authorize('update-this', $product);

        $product->delete(); // Fire event on deleting to delete images from storage

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressDeleted'));
    }

    public function destroyPicture(ProductPicture $picture)
    {
        $this->authorize('update-this', $picture->product);

        $picture->delete(); // Fire event on deleting to delete images from storage

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressDeleted'));
    }
}
