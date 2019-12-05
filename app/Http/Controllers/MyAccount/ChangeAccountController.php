<?php

namespace App\Http\Controllers\MyAccount;

use App\Events\ImageChanged;
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

        $images = [];

        if (isset($validated['avatar'])) {
            $validated['avatar'] = ImageHandlerService::storeImage($request, $request->user(), 'avatar');
            $images = Arr::add($images, 'avatar', $request->user()->avatar);
        }

        $request->user()->fill($validated);
        $request->user()->save();

        if ($images) {
            event(new ImageChanged($request->user(), $images));
        }

        return redirect()->back()
                         ->with('sweet.success', trans('message.accountChanged'));
    }
}
