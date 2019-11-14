@extends('layouts.base')

@section('title', __('view.change.title'))

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold">{{ __('view.change.title') }}</h2>
            <form method="POST" action="{{ route('password.change') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">{{ __('view.change.passwordOld') }}</label>
                    <input type="password" name="password-old" id="password-old" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('view.change.passwordNew') }}</label>
                    <input type="password" name="password-new" id="password-new">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('view.change.passwordNewConfirm') }}</label>
                    <input type="password" name="password-new_confirmation" id="password-new_confirmation">
                </div>
                <button type="submit" class="button button--block">{{ __('view.change.submit') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
