<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Product;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after specified actions.
     *
     * @var string
     */
    protected $redirectTo = '/my-account/products';

    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Values [$products] bound to view in ViewServiceProvider
        return view('my-account.products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        Product::create(
            Arr::add($request->validated(), 'user_id', $request->user()->id)
        );

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.productAdded'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update-this', $product);

        return view('my-account.product', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, Product $product)
    {
        $this->authorize('update-this', $product);

        $product->fill($request->validated());
        $product->save();

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('update-this', $product);

        $product->delete();

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressDeleted'));
    }
}
