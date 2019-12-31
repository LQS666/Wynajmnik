@extends('layouts.base')

@section('content')

<header class="welcome-header">
    <main class="welcome">
        <div class="welcome__content">
            <h1 class="fade-up">{{ __('home.hero.title') }}</h1>
            <p class="fade-up">{{ __('home.hero.desc') }}</p>
            <div class="welcome__content__searchbar fade-up">
                <form class="search">
                    <input type="search" class="search__input" name="search" placeholder="{{ __('home.hero.placeholder') }}"
                        autocomplete="off" required>
                    <button class="search__btn">{{ __('home.hero.search') }}</button>
                </form>
            </div>
            <div class="welcome__content__other fade-up">
                <span>{{ __('home.hero.other') }}</span>
                <a href="#">
                    {{ __('home.hero.categories') }}
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
        @foreach(range(1, 3) as $item)
        <div class="advantages__item">
            <p class="advantages__title">{{ __('home.advantages.'. $item .'.title') }}</p>
            <p class="advantages__desc">{{ __('home.advantages.'. $item .'.desc') }}</p>
        </div>
        @endforeach
    </div>
</section>

<section class="about">
    <div class="about__content">
        <div class="about__image-container">
            <img src="{{ asset('/assets/images/about.jpg')}}" alt="">
        </div>
        <div class="about__content__desc">
            <p>
                <span>{{ __('home.about.title') }}</span> 
                {{ __('home.about.desc') }}
            </p>
        </div>
        <div class="about__content__title"><p>{{ __('home.about.motto') }}</p></div>
    </div>
    <div class="cta-start">
    </div>
    <div class="cta">
        <div class="cta__clouds"></div>
        <div class="cta__content">
            <p>{{ __('home.about.cta') }}</p> 
            <a href="" class="button">{{ __('home.about.cta-btn') }}</a>
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
                <h4>{{ __('home.promo.item1') }}</h4>
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
                <h4>{{ __('home.promo.item2') }}</h4>
                <h4>{{ __('home.promo.item3') }}</h4>
            </div>
        </div>
    </div>
</section>

@endsection