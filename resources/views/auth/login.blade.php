@extends('layouts.base')

@section('title', __('view.login.title'))

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold" data-title="{{ __('view.login.title') }}">{{ __('view.login.title') }}</h2>
            <form method="POST" action="{{ route('account.login') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">{{ __('view.login.email') }}</label>
                    <input type="email" name="email" id="email" value="{{ old('email')  }}" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('view.login.password') }}</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form--options">
                    <div>
                        <a href="{{ route('password.request') }}">{{ __('view.login.reset') }}</a>
                    </div>
                    <div>
                        {{ __('view.login.registerQuestion') }} <a href="{{ route('account.register') }}">{{ __('view.login.register') }}</a>
                    </div>
                </div>
                <button type="submit" class="button button--block">{{ __('view.login.submit') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
