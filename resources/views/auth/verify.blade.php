@extends('layouts.base')

@section('title', __('auth/verify.title'))

@section('content')

<div class="header-container mx-auto">
    <div class="login-box">
        <h2 class="font-semibold">{{ __('auth/verify.title') }}</h2>

        <div>{{ __('auth/verify.note') }}</div>

        <a class="button inline-block mt-8" href="{{ route('verification.resend') }}">{{ __('auth/verify.resend') }}</a>
    </div>
</div>

@endsection
