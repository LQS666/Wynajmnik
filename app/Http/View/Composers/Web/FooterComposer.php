<?php

namespace App\Http\View\Composers\Web;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooterComposer
{
    public function __construct(Request $request) {
        //
    }

    public function compose(View $view) {
        $sites = Site::visible()
            ->group()
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('group');

        $view->with('sites', $sites);
    }
}
