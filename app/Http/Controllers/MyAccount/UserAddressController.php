<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\User;
use App\UserAddress;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAddressController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after specified actions.
     *
     * @var string
     */
    protected $redirectTo = '/my-account/addresses';

    /**
     * Get a validator for an incoming change request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'street' => ['required', 'string', 'max:255'],
            'home_number' => ['required', 'string', 'max:10'],
            'apartment_number' => ['nullable', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:6'],
            'latitude' => ['nullable', 'numeric', 'between:-90,00.90,00'],
            'longitude' => ['nullable', 'numeric', 'between:-90,00.90,00']
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

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
    public function edit(Request $request, $id)
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
    public function update(Request $request, $id)
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
    public function destroy(Request $request, $id)
    {
        $address = UserAddress::user($request->user()->id)
                              ->findOrFail($id);
        $address->delete();

        return redirect($this->redirectPath())
                             ->with('sweet.success', trans('message.addressDeleted'));
    }
}
