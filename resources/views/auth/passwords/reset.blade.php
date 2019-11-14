@extends('layouts.base')

@section('title', __('view.reset.title'))

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold">{{ __('view.reset.title') }}</h2>
            <form method="POST" action="{{ route('password.update') }}" class="form">
                @csrf
                <input type="hidden" name="token" value="{{ $token  }}">
                <div class="form--input-box">
                    <label for="email">{{ __('view.reset.email') }}</label>
                    <input type="email" name="email" id="email" value="{{ $email }}" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('view.reset.passwordNew') }}</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('view.reset.passwordNewConfirm') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <button type="submit" class="button button--block">{{ __('view.reset.submit') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
