@extends('layouts.base')

@section('content')

<header class="welcome-header">
    <main class="welcome">
        <div class="welcome__content">
            <h1 class="fade-up">{{ __('home.hero.title') }}</h1>
            <p class="fade-up">{{ __('home.hero.desc') }}</p>
            <div class="welcome__content__searchbar fade-up">
                <form class="search" method="GET" action="{{ route('web.search') }}">
                    <input type="search" class="search__input" name="search" placeholder="{{ __('home.hero.placeholder') }}"
                        autocomplete="off" required>
                    <button class="search__btn">{{ __('home.hero.search') }}</button>
                </form>
            </div>
            <div class="welcome__content__other fade-up">
                <span>{{ __('home.hero.other') }}</span>
                <a href="{{ route('web.categories') }}">
                    {{ __('home.hero.categories') }}
                </a>
            </div>
        </div>
    </main>
    <aside class="welcome-right">
        <div class="wrapper">
            <img class="welcome__image" src="{{ asset('/assets/images/home_page/header.svg')}}" alt="header_image">
        </div>
    </aside>
</header>

<div class="before-advantages"></div>

<section class="advantages">
    <div class="advantages__container container">
        @foreach(range(1, 3) as $item)
        <div class="advantages__item">
            <p class="advantages__title" data-aos="fade-up" data-aos-anchor-placement="top-bottom">{{ __('home.advantages.'. $item .'.title') }}</p>
            <p class="advantages__desc" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-offset="150">{{ __('home.advantages.'. $item .'.desc') }}</p>
        </div>
        @endforeach
    </div>
</section>

<section class="about">
    <div class="about__content">
        <div class="about__image-container">
            <img src="{{ asset('/assets/images/home_page/about.jpg')}}" alt="about_image">
        </div>
        <div class="about__content__desc" data-aos="fade-left">
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
            <p data-aos="fade">{{ __('home.about.cta') }}</p>
            <a href="{{ route('register') }}" class="button" data-aos="fade">{{ __('home.about.cta-btn') }}</a>
        </div>
      </div>
    </div>
    <div class="cta-end">
    </div>
</section>

<section class="promo">
    <div class="max-w-5xl mx-auto m-8 container">

        <div class="promo__item1">
            <div class="promo__item1__desc" data-aos="fade-right">
                <h4>{{ __('home.promo.item1') }}</h4>
            </div>
            <div class="promo__item1__img">
                <img src="{{ asset('/assets/images/home_page/promo1.svg')}}" alt="infographic1">
            </div>
        </div>

        <div class="promo__item2">
            <div class="promo__item2__img">
                <img src="{{ asset('/assets/images/home_page/promo2.svg')}}" alt="infographic2">
            </div>
            <div class="promo__item2__desc" data-aos="fade-left">
                <h4>{{ __('home.promo.item2') }}</h4>
                <h4>{{ __('home.promo.item3') }}</h4>
            </div>
        </div>
    </div>
</section>

<section class="cookie-wrapper">
    <div class="cookie-content">
        <div class="cookie-text-wrapper">
            <p class="cookie-text">{{ __('cookies.text') }}
                <a href="{{ asset('/storage/Polityka_Prywatności.pdf')}}" target="_blank">{{ __('cookies.privacy_policy') }}</a>
            </p>
        </div>
        <div class="cookie-button-wrapper">
            <a id="cookie_accept_btn" class="cookie-button">{{ __('cookies.agreed') }}</a>
        </div>
    </div>
</section>

@endsection
