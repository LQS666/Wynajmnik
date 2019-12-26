@extends('layouts.admin')

@section('title', __('dashboard/address.title'))

@section('profile')


<div class="main-dashboard-panels">
    <div class="main-dashboard-panel">
        <div>
            @if(count($errors) > 0)
                {{ current($errors) }}
            @else
                {{ __('payments.payu.finish') }}
            @endif
        </div>
    </div>
</div>

@endsection
