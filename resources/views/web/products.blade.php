@extends('layouts.base')

@section('title', __('web/products.title'))

@section('content')

<div class="product-view__gallery">
    <div class="loader">
        <img class="loader__icon" src="{{ asset('/assets/images/brand/logo_icon.png')}}" />
        <p class="loading">Ładowanie listy przedmiotów</p>
    </div>
</div>

@if (count($categories) > 0)
<nav class="results-nav">
    <ul>
        <li>
            <a href="{{ route('web.categories') }}" class="{{ empty($category) ? 'active' : '' }}">{{ __('web/products.all_products') }}</a>
        </li>
        @foreach ($categories as $_category)
            <li>
                <a href="{{ route('web.categories', ['category' => $_category['slug']]) }}" class="{{ (!empty($category) && $category['id'] === $_category['id']) ? 'active' : '' }}">{{ $_category['name'] }}</a>
            </li>
        @endforeach
    </ul>
    @if (!empty($category) && count($current) > 0)
        <ul class="bg-gray-700">
            @foreach ($current as $_category)
                <li>
                    <a href="{{ route('web.categories', ['category' => $_category['slug']]) }}" class="{{ (!empty($category) && $category['id'] === $_category['id']) ? 'active' : '' }}">{{ $_category['name'] }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</nav>
@endif

<main class="results">
    <div>
        <form class="form" method="GET" action="{{ route('web.search') }}">
            <div class="filter-section__wrapper">
                <section class="filter-section">
                    <div class="form--input-box m-3">
                        <input type="search" class="search__input" name="search"
                            placeholder="{{ __('web/products.placeholder') }}" autocomplete="off" required>
                    </div>
                    <button class="search-button mb-4">{{ __('home.hero.search') }}</button>
                </section>
            </div>
        </form>
        @if (count($filters) > 0)
            <form class="form" method="GET" action="{{ route('web.categories') }}">
                <div class="filter-section__wrapper">
                    <section class="filter-section">
                        @foreach ($filters as $filter)
                            @if (count($filter->values) <= 0)
                                @continue
                            @endif

                            <div class="filters">
                                <h5 class="filters__title">{{ $filter['name'] }}</h5>

                                @foreach ($filter->values as $_vi => $value)
                                <div class="filters__item">
                                    <div class="checkbox">
                                        <input id="checkbox-{{ $value['id'] }}" type="checkbox" name="filter[{{ $filter['id'] }}][]" value="{{ $value['id'] }}"
                                            {{ (!empty($parameters['filter'][$filter['id']]) && in_array($value['id'], $parameters['filter'][$filter['id']])) ?
                                                ' checked="checked"' :
                                                    '' }}
                                        />
                                        <label for="checkbox-{{ $value['id'] }}">{{ $value['value'] }}<span class="box"></span></label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endforeach
                        <button class="search-button mt-4">{{ __('home.hero.filter') }}</button>
                    </section>
                </div>
            </form>
        @endif
    </div>

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
                @if (count($product['filterValues']) > 0)
                    <div>
                        @foreach ($product['filterValues'] as $_vi => $value)
                            @if ($_vi === 3)
                                @break
                            @endif
                            <p class="profile__stats__item">{{ $value['filter']['name'] . ': ' . $value['value'] }}</p>
                        @endforeach
                        </div>
                @endif
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
