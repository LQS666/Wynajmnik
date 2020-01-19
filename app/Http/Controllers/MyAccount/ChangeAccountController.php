<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use App\Services\ImageHandlerService;
use App\Traits\ChangePasswords;

class ChangeAccountController extends Controller
{
    use ChangePasswords;

    protected $redirectTo;

    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
        $this->redirectTo = route('my-account.profile');
    }

    public function change(UpdateUser $request)
    {
        $validated = $request->validated();

        if (isset($validated['avatar'])) {
            ImageHandlerService::storeImage($validated['avatar'], $request->user(), 'avatar');
        }

        $request->user()->update($validated);

        return redirect($this->redirectPath())
            ->with('sweet.success', trans('message.accountChanged'));
    }
}
