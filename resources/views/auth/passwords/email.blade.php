@extends('layouts.base')

@section('title', 'Przypomnij hasło')

@section('content')

<div class="container mx-auto">
    <div class="header-container">
        <div class="login-box">
            <h2 class="font-semibold">Przypomnij hasło</h2>
            <form method="POST" action="{{ route('password.email') }}" class="form">
                @csrf
                <div class="form--input-box">
                    <label for="email">Adres e-mail</label>
                    <input type="email" name="email" id="email" autocomplete="off">
                </div>
                <button type="submit" class="button button--block">Wyślij wiadomość</button>
            </form>
        </div>
    </div>
</div>

@endsection
