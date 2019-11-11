@extends('layouts.base')

@section('title', 'Logowanie')

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold" data-title="Logowanie">Logowanie</h2>
            <form method="POST" action="{{ route('account.login') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">Adres e-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email')  }}" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">Hasło</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form--options">
                    <div>
                        <a href="{{ route('account.password.request') }}">Zapomniałeś hasła?</a>
                    </div>
                    <div>
                        Nie posiadasz konta? <a href="{{ route('account.register') }}">Zarejestruj się</a>
                    </div>
                </div>
                <button type="submit" class="button button--block">Zaloguj się</button>
            </form>
        </div>
    </div>
</div>

@endsection
