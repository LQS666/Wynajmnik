@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">
    <div class="main-dashboard-panel">
        <h2 class="font-semibold">{{ __('dashboard/product.edit') }}</h2>
        <div class="container">
            @if (isset($payu))
                <form method="{{ $payu['method'] }}" action="{{ $payu['action'] }}">
                    @foreach($payu['values'] as $name => $value)
                        <input type="text" name="{{ $name }}" value="{{ $value }}"/>
                    @endforeach
                    <input type="submit">
                </form>
            @else
                <form method="POST" action="{{ route('my-account.payments') }}">
                    @csrf
                    <input type="text" name="amount" value="1000">
                    <input type="submit"/>
                </form>
            @endif
        </div>
        <div>
            @if (count($payments) > 0)
                @foreach($payments as $payment)
                    {{ $payment }}
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
