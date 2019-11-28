@extends('layouts.base')

@section('title', __('auth/register.title'))

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold" data-title="{{ __('auth/register.title') }}">{{ __('auth/register.title') }}</h2>
            <form method="POST" action="{{ route('register') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">{{ __('auth/register.email') }}</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('auth/register.password') }}</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form--input-box">
                    <label for="password">{{ __('auth/register.passwordConfirm') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form--input-box">
                    <label for="name">{{ __('auth/register.name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="surname">{{ __('auth/register.surname') }}</label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname') }}" autocomplete="off">
                </div>
                <div class="form--input-box" data-title="date">
                    <label for="birth_date">{{ __('auth/register.birth_date') }}</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}">
                </div>
                <button type="submit" class="button button--block mt-12">{{ __('auth/register.submit') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
