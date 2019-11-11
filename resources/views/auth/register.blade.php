@extends('layouts.base')

@section('title', 'Rejestracja')

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold" data-title="Rejestracja">Rejestracja</h2>
            <form method="POST" action="{{ route('account.register') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">Adres e-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">Hasło</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form--input-box">
                    <label for="password">Powtórz hasło</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form--input-box">
                    <label for="name">Imię</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="surname">Nazwisko</label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname') }}" autocomplete="off">
                </div>
                <div class="form--input-box" data-title="date">
                    <label for="birth_date">Data urodzenia</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}">
                </div>
                <button type="submit" class="button button--block">Zarejestruj się</button>
            </form>
        </div>
    </div>
</div>

@endsection
