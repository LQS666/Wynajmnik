<?php

namespace App\Http\View\Composers\MyAccount;

use App\UserAddress;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AddressesComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $addresses = UserAddress::user($this->user->id)
                                ->orderBy('created_at')
                                ->paginate(10);

        $view->with('addresses', $addresses);
    }
}
