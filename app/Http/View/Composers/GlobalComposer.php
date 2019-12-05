<?php

namespace App\Http\View\Composers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class GlobalComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        if (!empty($this->user->avatar)) {
            $this->user->avatarUrl = Storage::url($this->user->avatar);
        }
        $view->with('user', $this->user);
    }
}
