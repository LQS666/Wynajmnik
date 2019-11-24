@extends('layouts.base')

@section('content')
    <header style="padding-top:80px">
        <div class="header-container container">
            <div class="header-container__item1 header-container__img">
                <img class="" src="{{ asset('/assets/images/header.svg') }}" alt="Header">
            </div>
            <div class="header-container__item2">
                <h1 class="header-container__title">{{ __('home.title') }}</h1>
                <p class="header-container__desc">{{ __('home.desc') }}</p>
                <div class="header-container__searchbar">
                    <form class="search">
                        <input type="search" class="search__input" name="search" placeholder="19 222 ogłoszeń w pobliżu" autocomplete="off" required>
                        <button class="search__btn">{{ __('home.search') }}</button>
                    </form>
                </div>
                <div class="header-container__other">
                    <span>{{ __('home.other') }}</span>
                    <a href="#">
                    {{ __('home.categories') }}
                    </a>
                </div>
            </div>
        {{-- <div class="mx-auto text-xl py-16 text-center">
            <h2 class="font-bold text-4xl mx-6 mb-12">{{ __('home.title') }}</h2>
            <div class="text-lg sm:text-xl mx-3 mb-12">{{ __('home.desc') }}</div>

            <div class="responsive-container">
            <iframe class="responsive-iframe w-full h-full top-0 left-0 border-0" src="https://www.youtube.com/embed/bK6XUxbbUEQ" style="border:0;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div> --}}
        </div>
    </header>
@endsection
