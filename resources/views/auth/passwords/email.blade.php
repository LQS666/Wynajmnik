@extends('layouts.base')

@section('title', __('auth/email.title'))

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold" data-title="{{ __('auth/email.title') }}">{{ __('auth/email.title') }}</h2>
            <form method="POST" action="{{ route('password.email') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">{{ __('auth/email.email') }}</label>
                    <input type="email" name="email" id="email" autocomplete="off">
                </div>
                <button type="submit" class="button button--block mt-12">{{ __('auth/email.submit') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
