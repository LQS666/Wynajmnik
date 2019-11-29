@extends('layouts.base')

@section('content')
<header>
    <div class="header-content container">
        <div class="header-content__left">
            <h1 class="header-content__title">{{ __('home.title') }}</h1>
            <p class="header-content__desc">{{ __('home.desc') }}</p>
            <div class="header-content__searchbar">
                <form class="search">
                    <input type="search" class="search__input" name="search" placeholder="19 222 ogłoszeń w pobliżu"
                        autocomplete="off" required>
                    <button class="search__btn">{{ __('home.search') }}</button>
                </form>
            </div>
            <div class="header-content__other">
                <span>{{ __('home.other') }}</span>
                <a href="#">
                    {{ __('home.categories') }}
                </a>
            </div>
        </div>
        <div class="header-content__right">
            <img class="w-full" src="{{ asset('/assets/images/header.svg')}}">
        </div>
    </div>
</header>

<section class="w-full" style="background-color: #6e72fc;
background-image: linear-gradient(315deg, #6e72fc 0%, #ad1deb 74%);">
    <div class="container w-full flex text-white justify-around items-center pt-12 pb-8 mx-auto">
        <div class="flex flex-col justify-center items-center">
            <p class="text-2xl font-semibold">Save money</p>
            <p>Buy less.</p>
        </div>
        <div class="flex flex-col justify-center items-center">
            <p class="text-2xl font-semibold">Save money</p>
            <p>Buy less.</p>
        </div>
        <div class="flex flex-col justify-center items-center">
            <p class="text-2xl font-semibold">Save money</p>
            <p>Buy less.</p>
        </div>
    </div>
</section>

<section class="promo">
    <div class="max-w-5xl mx-auto m-8 container">

        <div class="promo__item1">
            <div class="promo__item1__desc">
                <h3>Dostęp do wszystkiego</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt
                    quis ligula non convallis. Mauris tincidunt, ipsum et cursus sagittis, purus tortor varius purus, a
                    dignissim nulla enim in purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                    tincidunt quis ligula non convallis. Mauris tincidunt, ipsum et cursus sagittis, purus tortor varius
                    purus, a dignissim nulla enim in purus. </p>

            </div>
            <div class="promo__item1__img">
                <img src="{{ asset('/assets/images/promo1.svg')}}">

            </div>
        </div>


        <div class="promo__item2">
            <div class="promo__item2__img">
                <img src="{{ asset('/assets/images/promo2.svg')}}">
            </div>
            <div class="promo__item1__desc">
                <h3>Zarabiaj na niepotrzebnych rzeczach</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                    tincidunt quis ligula non convallis. Mauris tincidunt, ipsum et cursus sagittis, purus tortor
                    varius purus, a dignissim nulla enim in purus. Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit. Vivamus tincidunt quis ligula non convallis. Mauris tincidunt, ipsum et cursus
                    sagittis, purus tortor varius purus, a dignissim nulla enim in purus. </p>
            </div>

        </div>
    </div>
</section>
@endsection