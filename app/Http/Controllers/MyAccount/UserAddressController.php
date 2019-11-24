<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAddress;
use App\UserAddress;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $addresses = UserAddress::user($request->user()->id)
                                ->orderBy('created_at')
                                ->get();

        return view('my-account.addresses', [
            'addresses' => $addresses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserAddress  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserAddress $request)
    {
        // $request->validated();

        UserAddress::create([
            'user_id' => $request->user()->id,
            'street' => $request->street,
            'home_number' => $request->home_number,
            'apartment_number' => $request->apartment_number,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressAdded'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) // TODO Request $request, UserAddress $address
    {
        $address = UserAddress::user($request->user()->id)
                              ->findOrFail($id);

        return view('my-account.edit', [
            'address' => $address
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // TODO Request $request, UserAddress $address
    {
        UserAddress::user($request->user()->id)
                   ->findOrFail($id);

        $this->validator($request->all())->validate();

        UserAddress::where('id', $id)
                   ->update((array) $request->user());

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) // TODO Request $request, UserAddress $address
    {
        $address = UserAddress::user($request->user()->id)
                              ->findOrFail($id);
        $address->delete();

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressDeleted'));
    }
}
