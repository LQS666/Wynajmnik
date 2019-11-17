@extends('layouts.base')

@section('title', __('auth/change.title'))

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold" data-title="{{ __('auth/change.title') }}">{{ __('auth/change.title') }}</h2>
            <form method="POST" action="{{ route('my-account.password-change') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">{{ __('auth/change.passwordOld') }}</label>
                    <input type="password" name="password-old" id="password-old" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('auth/change.passwordNew') }}</label>
                    <input type="password" name="password-new" id="password-new">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('auth/change.passwordNewConfirm') }}</label>
                    <input type="password" name="password-new_confirmation" id="password-new_confirmation">
                </div>
                <button type="submit" class="button button--block">{{ __('auth/change.submit') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
