@extends('layouts.base')

@section('title', __('web/products.title'))

@section('content')

{{-- <div class="container">
    {{ dd($products) }}
{{ dd($category) }}
{{ dd($categories) }}
{{ dd($current) }}
{{ dd($filters) }}

<div class="pt-24">
    @foreach ($products as $product)
    {{ $product }}
    @endforeach
</div>
</div> --}}
<div class="product-view__gallery">
    <div class="loader">
        <img class="loader__icon" src="{{ asset('/assets/images/brand/logo_icon.png')}}" />
        <p class="loading">Ładowanie listy przedmiotów</p>
    </div>
</div>

<nav class="results-nav">
    <ul>
        <li><a href="" class="active">{{ __('web/products.all_products') }}</a></li>
        <li><a href="">RC</a></li>
        <li><a href="">Akcesoria</a></li>
    </ul>
</nav>

<main class="results">
    <form class="form" method="GET" action="{{ route('web.search') }}">
        <div class="filter-section__wrapper">
            <section class="filter-section">
                <div class="form--input-box m-3">
                    <input type="search" class="search__input" name="search"
                        placeholder="{{ __('web/products.placeholder') }}" autocomplete="off" required>
                </div>
                <button class="search-button mb-4">{{ __('home.hero.search') }}</button>

                <div class="filters">
                    <h5 class="filters__title">Parametr 1</h5>
                    <div class="filters__item">
                        <div class="checkbox">
                            <input id="checkbox-1" type="checkbox" name="camera" value="1" />
                            <label for="checkbox-1">Opcja<span class="box"></span></label>
                        </div>
                    </div>
                    <div class="filters__item">
                        <div class="checkbox">
                            <input id="checkbox-2" type="checkbox" name="camera" value="1" />
                            <label for="checkbox-2">Opcja<span class="box"></span></label>
                        </div>
                    </div>
                    <div class="filters__item">
                        <div class="checkbox">
                            <input id="checkbox-3" type="checkbox" name="camera" value="1" />
                            <label for="checkbox-3">Opcja<span class="box"></span></label>
                        </div>
                    </div>
                    <div class="filters__item">
                        <div class="checkbox">
                            <input id="checkbox-4" type="checkbox" name="camera" value="1" />
                            <label for="checkbox-4">Opcja<span class="box"></span></label>
                        </div>
                    </div>
                </div>
                <div class="filters">
                    <h5 class="filters__title">Parametr 2</h5>
                    <div class="filters__item">
                        <div class="checkbox">
                            <input id="checkbox-5" type="checkbox" name="distance[]" value="1" />
                            <label for="checkbox-5">Opcja<span class="box"></span></label>
                        </div>
                    </div>
                    <div class="filters__item">
                        <div class="checkbox">
                            <input id="checkbox-6" type="checkbox" name="distance[]" value="1" />
                            <label for="checkbox-6">Opcja<span class="box"></span></label>
                        </div>
                    </div>
                    <div class="filters__item">
                        <div class="checkbox">
                            <input id="checkbox-7" type="checkbox" name="distance[]" value="1" />
                            <label for="checkbox-7">Opcja<span class="box"></span></label>
                        </div>
                    </div>
                    <div class="filters__item">
                        <div class="checkbox">
                            <input id="checkbox-8" type="checkbox" name="distance[]" value="1" />
                            <label for="checkbox-8">Opcja<span class="box"></span></label>
                        </div>
                    </div>
                </div>

            </section>
        </div>

    </form>

    <section class="results__section results--grid">
        @foreach ($products as $product)
        <div class="profile">
            <div class="profile__image">
                @if (count($product['images']) > 0)
                <img class="itemImg" src="{{ Storage::url($product->images->first()['file']) }}"
                    alt="{{ Str::limit($product['name'], 20, ' ...') }}" />
                @else
                <img class="itemImg" src="{{ asset('/assets/images/item.jpeg')}}" alt="Default Image" />
                @endif
            </div>
            <div class="profile__info">
                <h3>{{ Str::limit($product['name'], 25, ' ...') }}</h3>
            </div>
            <div class="profile__stats">
                <div>
                    <p class="profile__stats__item">Kamera: 12 Mpix</p>
                    <p class="profile__stats__item">Zasięg: 200m</p>
                    <p class="profile__stats__item">Czas pracy: 30 min</p>
                </div>
                <div>
                    <h5 class="profile__stats__price">Cena: {{ $product['price'] }}</h5>
                </div>
            </div>
            <div class="profile__button"><a href="{{ route('web.product', ['product' => $product['slug']]) }}"
                    class="button">{{ __('web/products.button') }}</a></div>
        </div>
        @endforeach

        <div class="pagination-container">
            {{ $products->links() }}
        </div>

    </section>
</main>

@endsection