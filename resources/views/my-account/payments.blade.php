@extends('layouts.admin')

@section('title', __('dashboard/payment.title'))

@section('profile')


<div class="main-dashboard-panels">
    <div class="main-dashboard-panel">
        <h2 class="font-semibold">{{ __('dashboard/payment.name') }}</h2>
        <div class="container">
            @if (isset($payu))
            <form class="flex flex-col" method="{{ $payu['method'] }}" action="{{ $payu['action'] }}" name="payuform">
                @foreach($payu['values'] as $name => $value)
                <input type="hidden" name="{{ $name }}" value="{{ $value }}" />
                @endforeach
            </form>
            <div class="loader">
                <img class="loader__icon" src="{{ asset('/assets/images/brand/logo_icon.png')}}" />
                <p class="loading">{!! __('dashboard/payment.loading') !!}</p>
            </div>
            @else
            <div class="payment__options">
                <div class="payment__items">
                    <form class="payment__item" method="POST" action="{{ route('my-account.payments') }}">
                        @csrf
                        <input type="hidden" name="amount" value="1000">
                        <span>1000pkt</span>
                        <button class="button mt-1 mx-3" type="submit">10zł</button>
                    </form>
                    <form class="payment__item" method="POST" action="{{ route('my-account.payments') }}">
                        @csrf
                        <input type="hidden" name="amount" value="2000">
                        <span>2000pkt</span>
                        <button class="button mx-3" type="submit">20zł</button>
                    </form>
                    <form class="payment__item" method="POST" action="{{ route('my-account.payments') }}">
                        @csrf
                        <input type="hidden" name="amount" value="5000">
                        <span>5000pkt</span>
                        <button class="button mx-3" type="submit">50zł</button>
                    </form>
                    <form class="payment__item" method="POST" action="{{ route('my-account.payments') }}">
                        @csrf
                        <input type="hidden" name="amount" value="10000">
                        <span>10000pkt</span>
                        <button class="button mx-3" type="submit">100zł</button>
                    </form>
                </div>
                <div class="payment__warning">
                    <p>{!! __('dashboard/payment.warning') !!}</p>
                </div>
            </div>
            @endif
        </div>

        @if (!isset($payu))
        @if (count($payments) > 0)
        <h3 class="payment__history">{{ __('dashboard/payment.history') }}</h3>
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
                        {!! $payment['status'] ? '<span class="text-green-600">'. __('dashboard/payment.paid') .'</span>' : '<span
                            class="text-red-500">'. __('dashboard/payment.unpaid') .'</span>' !!}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="pagination-container">
            {{ $payments->links() }}
        </div>

        @else

        <div class="payment__empty-list">
            {{ __('dashboard/payment.empty-table') }}
        </div>

        @endif
        @endif
    </div>
</div>

@if (isset($payu))
<script>
    setTimeout(function() {
        document.forms['payuform'].submit();
    }, 5000);
</script>
@endif

@endsection
