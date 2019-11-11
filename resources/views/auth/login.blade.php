@extends('layouts.base')

@section('title', 'Logowanie')

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold" data-title="Logowanie">Logowanie</h2>
            <form action="/" class="form">
                <div class="form--input-box">
                    <label for="login">Nazwa użytkownika</label>
                    <input type="text" name="login" id="login" autocomplete="off">
                </div>
                <div class="form--input-box">
                    <label for="password">Hasło</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form--options">
                    <div>
                        <a href="/">Zapomniałeś hasła?</a>
                    </div>
                    <div>
                        Nie posiadasz konta? <a href="/">Zarejestruj się</a>
                    </div>
                </div>
                <button type="submit" class="button button--block">Zaloguj się</button>
            </form>
        </div>
    </div>
</div>

@endsection
