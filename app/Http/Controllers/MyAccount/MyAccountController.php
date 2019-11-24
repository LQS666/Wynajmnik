<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
    }

    public function __invoke() {
        return view('my-account.profile');
    }
}
