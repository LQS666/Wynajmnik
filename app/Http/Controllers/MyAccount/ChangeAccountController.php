<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use App\Services\ImageHandlerService;
use Illuminate\Support\Arr;

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

        if (isset($validated['avatar'])) {
            ImageHandlerService::storeImage($validated['avatar'], $request->user(), 'avatar');
        }

        $request->user()->update($validated);

        return redirect()->back()
                         ->with('sweet.success', trans('message.accountChanged'));
    }
}
