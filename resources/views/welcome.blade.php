@extends('layouts.base')

@section('content')

<header class="welcome-header">
    <main class="welcome">
        <div class="welcome__content">
            <h1 class="fade-up">Wypożycz wszystko, tutaj.</h1>
            <p class="fade-up">Ludzie poszukują specjalistycznego sprzętu.</p>
            <div class="welcome__content__searchbar fade-up">
                <form class="search">
                    <input type="search" class="search__input" name="search" placeholder="np. dron"
                        autocomplete="off" required>
                    <button class="search__btn">{{ __('home.search') }}</button>
                </form>
            </div>
            <div class="welcome__content__other fade-up">
                <span>{{ __('home.other') }}</span>
                <a href="#">
                    {{ __('home.categories') }}
                </a>
            </div>
        </div>
    </main>
    <aside class="welcome-right">
        <div class="wrapper">
            <img class="welcome__image" src="{{ asset('/assets/images/header.svg')}}" alt="Swirl Graphic">
        </div>
    </aside>
</header>

<div class="before-advantages"></div>

<section class="advantages">
    <div class="advantages__container container">
        <div class="advantages__item">
            <p class="advantages__title">Oszczędzaj pieniądze</p>
            <p class="advantages__desc">Kupuj mniej. Po co kupować rzeczy, które zostaną użyte raz na rok? Zarabiaj na sprzęcie, którego nie używasz.</p>
        </div>
        <div class="advantages__item">
            <p class="advantages__title">Dostęp do wszystkiego</p>
            <p class="advantages__desc">Otrzymaj dostęp do sporej bazy przedmiotów najwyższej jakości.</p>
        </div>
        <div class="advantages__item">
            <p class="advantages__title">Oczyść planetę</p>
            <p class="advantages__desc">Dbaj o środowisko. Nie trzymaj niepotrzebnych rzeczy i nie zagracaj mieszkania.</p>
        </div>
    </div>
</section>

<section class="about">
    <div class="about__content">
        <div class="about__image-container">
            <img src="{{ asset('/assets/images/about.jpg')}}" alt="">
        </div>
        <div class="about__content__desc">
            <p>
                <span>Wynajmnik.pl</span> 
                jest platformą służącą do wymiany dronów i sprzętu z nimi związanego. 
            </p>
        </div>
        <div class="about__content__title"><p>It's simple to share</p></div>
    </div>
    <div class="cta-start">
    </div>
    <div class="cta">
        <div class="cta__clouds"></div>
        <div class="cta__content">
            <p>Znajdź, wypożycz, lataj!</p> 
            <a href="" class="button">Zarejestruj się już teraz</a>
        </div>
      </div>
    </div>
    <div class="cta-end">
    </div>
</section>

<section class="promo">
    <div class="max-w-5xl mx-auto m-8 container">

        <div class="promo__item1">
            <div class="promo__item1__desc">
                <h4>Od specjalistów, dla specjalistów i domowych użytkowników. Jesteś fotografem i potrzebujesz drona na jeden dzień? </h4>
            </div>
            <div class="promo__item1__img">
                <img src="{{ asset('/assets/images/promo1.svg')}}">
            </div>
        </div>

        <div class="promo__item2">
            <div class="promo__item2__img">
                <img src="{{ asset('/assets/images/promo2.svg')}}">
            </div>
            <div class="promo__item2__desc">
                <h4>Chciałbyś spróbować lotów dronami RC w goglach? Nic prostszego! </h4>
                <h4>Masz na oku nową maszynę, ale nie wiesz czy będzie dla Ciebie idealna?</h4>
            </div>
        </div>
    </div>
</section>

@endsection