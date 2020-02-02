@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">
    <div class="main-dashboard-panel">
        <div class="payment-finish">
            @if(count($errors) > 0)
            <div class="error">
                <i>✖✓</i>
            </div>
            <h1 class="error__h1">{{ __('payments.payu.finish_title_error') }}</h1>
            <p class="error__p">{{ __('payments.payu.finish_content_error') }}</p>
            {{ current($errors) }}
            @else
            <div class="success">
                <i>✓</i>
            </div>
            <h1 class="success__h1">{{ __('payments.payu.finish_title_success') }}</h1>
            <p class="success__p">{{ __('payments.payu.finish_content_success') }}</p>
            @endif
        </div>
    </div>
</div>

@endsection