<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;

class ChangeAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
    }

    public function change(UpdateUser $request)
    {
        $validated = $request->validated();

        $request->user()->fill($validated);
        $request->user()->save();

        return redirect()->back()
                         ->with('sweet.success', trans('message.accountChanged'));
    }
}
