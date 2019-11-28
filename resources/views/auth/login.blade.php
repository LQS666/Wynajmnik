@extends('layouts.base')

@section('title', __('auth/login.title'))

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold" data-title="{{ __('auth/login.title') }}">{{ __('auth/login.title') }}</h2>
            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">{{ __('auth/login.email') }}</label>
                    <input type="email" name="email" id="email" value="{{ old('email')  }}" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('auth/login.password') }}</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form--options">
                    <div>
                        <a href="{{ route('password.request') }}">{{ __('auth/login.reset') }}</a>
                    </div>
                    <div>
                        <span class="block">{{ __('auth/login.registerQuestion') }}</span> <a href="{{ route('register') }}">{{ __('auth/login.register') }}</a>
                    </div>
                </div>
                <button type="submit" class="button button--block mt-12">{{ __('auth/login.submit') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
