<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Product;
use App\Services\PointService;
use App\Services\ProductService;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use RedirectsUsers;

    protected $redirectTo;

    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
        $this->redirectTo = route('my-account.products');
    }

    public function index()
    {
        // Values [$products] bound to view in ViewServiceProvider
        return view('my-account.products');
    }

    public function new(Request $request) {
        // Values [$categories, $filters] bound to view in ViewServiceProvider

        if (count($request->user()->addresses) === 0) { // if dont have any defined addresses redirect to addresses view
            return redirect(route('my-account.addresses'))
                                 ->with('sweet.info', trans('message.productAddressAdd'));
        }

        return view('my-account.product-new');
    }

    public function store(StoreProduct $request)
    {
        $validated = $request->validated();

        ########################################

        $to_check = [];

        if ($request->user()->freeAddCount === 0) {
            $to_check[] = PointService::ADD_OVER_LIMIT;
        }

        if (!empty($validated['premium'])) {
            $to_check[] = PointService::ADD_PREMIUM;
        }

        if (!PointService::checkIfEnough($to_check)) {
            return redirect()->back()
                             ->with('sweet.error', trans('message.notEnoughPoints'));
        }

        ########################################

        ProductService::store($validated);
        foreach ($to_check as $mode) {
            PointService::makeAnyTransaction($mode);
        }

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.productAdded'));
    }

    public function edit(Product $product)
    {
        // Values [$categories, $filters] bound to view in ViewServiceProvider
        $this->authorize('areYouOwner', $product);

        return view('my-account.product-edit', [
            'product' => $product
        ]);
    }

    public function update(StoreProduct $request, Product $product) // TODO change StoreProduct to UpdateProduct
    {
        $this->authorize('areYouOwner', $product);

        ProductService::update($product, $request->validated());

        return redirect()->back()
                         ->with('sweet.success', trans('message.productUpdated'));
    }

    public function destroy(Product $product)
    {
        $this->authorize('areYouOwner', $product);

        ProductService::destroy($product);

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.productDestroyed'));
    }

    /*public function destroyPicture(ProductPicture $picture)
    {
        $this->authorize('areYouOwner', $picture->product);

        $picture->delete(); // Fire event on deleting to delete images from storage

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.productPictureDestroyed'));
    }*/
}
