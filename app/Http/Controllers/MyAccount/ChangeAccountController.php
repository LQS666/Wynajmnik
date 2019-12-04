<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Storage;

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

        $avatar = $request->user()->avatar;

        if (isset($validated['avatar'])) {
            $validated['avatar'] = $request->file('avatar')->store('avatars');
        }

        $request->user()->fill($validated);
        $request->user()->save();

        if ($avatar) {
            Storage::delete($avatar);
        }

        return redirect()->back()
                         ->with('sweet.success', trans('message.accountChanged'));
    }
}
