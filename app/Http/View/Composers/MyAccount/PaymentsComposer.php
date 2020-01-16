<?php

namespace App\Http\View\Composers\MyAccount;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentsComposer
{
    protected $user;

    public function __construct(Request $request) {
        $this->user = $request->user();
    }

    public function compose(View $view) {
        $payments = Payment::user($this->user->id)
                            ->orderBy('created_at')
                            ->paginate(10);

        $view->with('payments', $payments);
    }
}
