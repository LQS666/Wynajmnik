@extends('layouts.base')

@section('title', 'Zmień hasło')

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold">Zmień hasło</h2>
            <form method="POST" action="{{ route('password.change') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">Stare hasło</label>
                    <input type="password" name="password-old" id="password-old" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">Nowe hasło</label>
                    <input type="password" name="password-new" id="password-new">
                </div>
                <div class="form--input-box">
                    <label for="password">Powtórz nowe hasło</label>
                    <input type="password" name="password-new_confirmation" id="password-new_confirmation">
                </div>
                <button type="submit" class="button button--block">Zmień hasło</button>
            </form>
        </div>
    </div>
</div>

@endsection
