<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Site;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use RedirectsUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->redirectTo = route('web.home');
    }

    public function index()
    {
        return redirect()->back();
    }

    public function show(Site $site)
    {
        if (empty($site->visible)) {
            return redirect($this->redirectPath());
        }

        return view('web.site', [
            'site' => $site
        ]);
    }
}
