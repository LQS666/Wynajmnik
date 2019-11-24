<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Traits\ChangePasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    use ChangePasswords;

    /**
     * Where to redirect users after changing their password.
     *
     * @var string
     */
    protected $redirectTo = '/my-account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
    }

    /**
     * Get a validator for an incoming change request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password-old' => ['required', 'string'],
            'password-new' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * The user password has been changed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function changed(Request $request, $user)
    {
        session()->flash('sweet.success', trans('message.passwordChanged'));
    }
}
