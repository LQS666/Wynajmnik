<?php

namespace App\Http\Controllers\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayment;
use App\Payment;
use App\Services\PayUService as PayU;
use App\Services\PointService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        // auth middleware defined for group in RouteServiceProvider
    }

    public function index()
    {
        // Value [$payments] bound to view in ViewServiceProvider
        return view('my-account.payments');
    }

    public function store(StorePayment $request)
    {
        $validated = $request->validated();

        $payment = Payment::create([
            'user_id' => $request->user()->id,
            'first_name' => $request->user()->name,
            'last_name' => $request->user()->surname,
            'amount' => $validated['amount'],
            'desc' => trans('payments.payu.desc', ['app_name' => env('APP_NAME')]),
            'client_ip' => request()->ip(),
            'session_id' => session()->getId() . time(),
            'ts' => (int) round(microtime(true) * 1000)
        ]);

        return redirect()->route('my-account.payment', [
            'payment' => $payment->id
        ]);
    }

    public function send(Payment $payment)
    {
        $this->authorize('areYouOwner', $payment);

        if (!empty($payment->error)) {
            return view('my-account.payments-finish', [
                'errors' => $payment->error
            ]);
        }

        if (!empty($payment->returned)) {
            return view('my-account.payments-finish', [
                'errors' => []
            ]);
        }

        $PayU = new PayU($payment);

        return view('my-account.payments', [
            'payu' => $PayU->prepareData()
        ]);
    }

    public function finish(Request $request)
    {
        return view('my-account.payments-finish', [
            'errors' => PayU::handleReturn($request, new Payment())
        ]);
    }

    public function report(Request $request)
    {
        if ($request = $request->all()) {
            try {
                if ($payment = PayU::handleStatus($request, new Payment())) {
                    if ($payment->owner) {
                        PointService::makeAnyTransaction(PointService::ADD_POINTS, $payment->owner, $payment->amount);
                    }
                }
                return 'OK';
            } catch (\Exception $e) {
                $message = $e->getMessage();
                Log::debug('ERROR: ' . $message['desc'] . ' : ' . $message['data']);
                return 'ERROR: ' . $message['desc'];
            }
        }
    }
}
