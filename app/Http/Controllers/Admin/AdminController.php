<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // auth and admin middleware defined for group in RouteServiceProvider
    }

    public function __invoke() {
        return view('my-account.profile');
    }
}
