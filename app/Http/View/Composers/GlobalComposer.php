<?php

namespace App\Http\View\Composers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class GlobalComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $view->with('user', $this->user);
    }
}
