<?php

namespace App\Http\View\Composers;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GlobalComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $sites = Site::orderBy('created_at', 'desc')
                     ->get();

        $view->with('user', $this->user);
        $view->with('sites', $sites);
    }
}
