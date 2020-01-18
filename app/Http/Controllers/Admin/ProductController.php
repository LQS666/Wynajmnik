<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProduct;
use App\Product;
use App\ProductPicture;
use App\Services\ProductService;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use RedirectsUsers;

    protected $redirectTo;

    public function __construct()
    {
        // auth and admin middleware defined for group in RouteServiceProvider
        $this->redirectTo = route('admin.products');
    }

    public function index()
    {
        // Values [$products] bound to view in ViewServiceProvider
        return view('admin.products');
    }

    public function edit(Product $product)
    {
        // Values [$categories, $filters] bound to view in ViewServiceProvider
        return view('admin.product-edit', [
            'product' => $product
        ]);
    }

    public function update(UpdateProduct $request, Product $product)
    {
        $validated = $request->validated();

        ProductService::update($product, $validated);

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.productUpdated'));
    }

    public function destroy(Product $product)
    {
        ProductService::destroy($product);

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.productDestroyed'));
    }

    public function destroyPicture(ProductPicture $picture)
    {
        $picture->delete(); // Fire event on deleting to delete images from storage

        return redirect()->back()
                         ->with('sweet.success', trans('message.productPictureDestroyed'));
    }
}
