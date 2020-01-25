<?php

namespace App\Http\View\Composers\Admin;

use App\Filter;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FiltersComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $filters = Filter::with('values')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $view->with('filters', $filters);
    }
}
