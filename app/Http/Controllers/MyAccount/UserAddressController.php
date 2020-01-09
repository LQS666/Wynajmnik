<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAddress;
use App\UserAddress;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Arr;

class UserAddressController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after specified actions.
     *
     * @var string
     */
    protected $redirectTo = '/my-account/addresses';

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
        // Values [$addresses] bound to view in ViewServiceProvider
        return view('my-account.addresses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserAddress  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserAddress $request)
    {
        UserAddress::create(
            Arr::add($request->validated(), 'user_id', $request->user()->id)
        );

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressAdded'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserAddress  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAddress $address)
    {
        $this->authorize('areYouOwner', $address);

        return view('my-account.address', [
            'address' => $address
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserAddress  $request
     * @param  \App\UserAddress  $address
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserAddress $request, UserAddress $address)
    {
        $this->authorize('areYouOwner', $address);

        $address->fill($request->validated());
        $address->save();

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserAddress  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAddress $address)
    {
        $this->authorize('areYouOwner', $address);

        $address->delete();

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressDeleted'));
    }
}
