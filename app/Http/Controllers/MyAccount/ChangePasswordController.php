<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Traits\ChangePasswords;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    use ChangePasswords;

    protected $redirectTo;

    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
        $this->redirectTo = route('my-account.profile');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password-old' => ['required', 'string'],
            'password-new' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    protected function changed()
    {
        session()->flash('sweet.success', trans('message.passwordChanged'));
    }
}
