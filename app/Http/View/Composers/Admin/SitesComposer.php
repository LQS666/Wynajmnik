<?php

namespace App\Http\View\Composers\Admin;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SitesComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $sites = Site::orderBy('created_at', 'desc')
                     ->get();

        $view->with('sites', $sites);
    }
}
