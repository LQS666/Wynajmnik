@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">
    <div class="main-dashboard-panel">
        <h2 class="font-semibold">{{ __('dashboard/payment.title') }}</h2>
        <div class="container">
            @if (isset($payu))
            <form class="flex flex-col" method="{{ $payu['method'] }}" action="{{ $payu['action'] }}" name="payuform">
                @foreach($payu['values'] as $name => $value)
                <input type="hidden" name="{{ $name }}" value="{{ $value }}" />
                @endforeach
            </form>
            <div class="flex justify-center items-center h-48">{{ __('dashboard/payment.loading') }}</div>
            @else
            <div class="flex flex-col justify-center items-center my-3">
                <div class="text-center">
                    <h4>{{ __('dashboard/payment.desc') }}</h4>
                    <p>10zł = 1000pkt</p>
                    <p>20zł = 2000pkt</p>
                    <p>50zł = 5000pkt</p>
                    <p>100zł = 10000pkt</p>
                </div>
                <div class="flex flex-wrap justify-center items-center my-3">
                    <form method="POST" action="{{ route('my-account.payments') }}">
                        @csrf
                        <input type="hidden" name="amount" value="1000">
                        <button class="button mx-3" type="submit">10zł</button>
                    </form>
                    <form method="POST" action="{{ route('my-account.payments') }}">
                        @csrf
                        <input type="hidden" name="amount" value="2000">
                        <button class="button mx-3" type="submit">20zł</button>
                    </form>
                    <form method="POST" action="{{ route('my-account.payments') }}">
                        @csrf
                        <input type="hidden" name="amount" value="5000">
                        <button class="button mx-3" type="submit">50zł</button>
                    </form>
                    <form method="POST" action="{{ route('my-account.payments') }}">
                        @csrf
                        <input type="hidden" name="amount" value="10000">
                        <button class="button mx-3" type="submit">100zł</button>
                    </form>
                </div>
                <div class="text-sm mb-6">
                    <p>{!! __('dashboard/payment.warning') !!}</p>
                </div>
                <h3 class="mt-12 mb-3 text-xl">{{ __('dashboard/payment.history') }}</h3>
            </div>
            @endif
        </div>

        @if (!isset($payu))
        @if (count($payments) > 0)
        <div class="table-items">
            <table cellspacing="0">

                <tr class="border-b">
                    <th>{{ __('dashboard/payment.id') }}</th>
                    <th>{{ __('dashboard/payment.date') }}</th>
                    <th>{{ __('dashboard/payment.points') }}</th>
                    <th>{{ __('dashboard/payment.status') }}</th>
                </tr>

                @foreach($payments as $payment)
                <tr>
                    <td class="payment">
                        {{ $payment['id']}}
                    </td>
                    <td class="payment">
                        {{ $payment['created_at']}}
                    </td>
                    <td class="payment">
                        {{ $payment['amount']}}
                    </td>
                    <td class="payment">
                        {!! $payment['status'] ? '<span class="text-green-600">Opłacaono</span>' : '<span class="text-red-500">Nieopłacono</span>' !!}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        @else

        <div class="flex justify-center items-center bg-purple-main w-1/2 py-3 rounded-lg">
            {{ __('dashboard/product.empty-table') }}
        </div>

        @endif
        @endif
    </div>
</div>

@if (isset($payu))
<script>
    // setTimeout(function() {
    //     document.forms['payuform'].submit();
    // }, 5000);
</script>
@endif

@endsection