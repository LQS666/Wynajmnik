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

    protected $redirectTo;

    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
        $this->redirectTo = route('my-account.addresses');
    }

    public function index()
    {
        // Values [$addresses] bound to view in ViewServiceProvider
        return view('my-account.addresses');
    }

    public function store(StoreUserAddress $request)
    {
        UserAddress::create(
            Arr::add($request->validated(), 'user_id', $request->user()->id)
        );

        return redirect($this->redirectPath())
            ->with('sweet.success', trans('message.addressCreated'));
    }

    public function edit(UserAddress $address)
    {
        $this->authorize('areYouOwner', $address);

        return view('my-account.address', [
            'address' => $address
        ]);
    }

    public function update(StoreUserAddress $request, UserAddress $address)
    {
        $this->authorize('areYouOwner', $address);

        $address->update($request->validated());

        return redirect($this->redirectPath())
            ->with('sweet.success', trans('message.addressUpdated'));
    }

    public function destroy(UserAddress $address)
    {
        $this->authorize('areYouOwner', $address);

        if (count($address->products) > 0) { // if address bound with products, do not remove
            return redirect()->back()
                ->with('sweet.error', trans('message.addressBoundWithProduct'));
        }

        $address->delete();

        return redirect($this->redirectPath())
            ->with('sweet.success', trans('message.addressDestroyed'));
    }
}
