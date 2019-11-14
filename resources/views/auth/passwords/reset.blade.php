@extends('layouts.base')

@section('title', 'Zresetuj hasło')

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold">Zresetuj hasło</h2>
            <form method="POST" action="{{ route('password.update') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">Adres e-mail</label>
                    <input type="email" name="email" id="email" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">Hasło</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form--input-box">
                    <label for="password">Powtórz hasło</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <button type="submit" class="button button--block">Zresetuj hasło</button>
            </form>
        </div>
    </div>
</div>

@endsection
