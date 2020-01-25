@extends('layouts.base')

@section('title', __('web/products.search_title'))

@section('content')

<div class="product-view__gallery">
    <div class="loader">
        <img class="loader__icon" src="{{ asset('/assets/images/brand/logo_icon.png')}}" />
        <p class="loading">Ładowanie listy przedmiotów</p>
    </div>
</div>

<div class="container mx-auto">
    <div class="px-3 w-full mx-auto" style="padding-top: 180px; min-height:100vh; max-width: 800px;">

        <form class="form mb-32" method="GET" action="{{ route('web.search') }}">
            <div class="form--input-box">
                <input type="search" class="search__input" name="search"
                    placeholder="{{ __('web/products.search_placeholder') }}" autocomplete="off" required>
            </div>
            <button class="button w-full lg:hidden">{{ __('home.hero.search') }}</button>
        </form>

        @if(isset($result))
                @if ($result-> isEmpty())
                    <span>{{ __('web/products.empty_results') }}: <b>"{{ $search }}"</b>.</span>
                @else
                    <span>{{ __('web/products.found_results') }}: <b>{{ $result->count() }}</b> {{ __('web/products.found2_results') }} <b>"{{ $search }}"</b></span>
                    <hr class="my-6" />
                    @foreach($result->groupByType() as $type => $modelSearchResults)
                        @foreach($modelSearchResults as $searchResult)
                            <a class="block w-full bg-purple-third py-3 px-6 my-2 rounded-lg" href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                        @endforeach
                    @endforeach
                    <hr class="mt-6" />
                    <div class="mt-6 mb-16">
                        <span>{{ __('web/products.go_to_categories') }}</span>
                        <a href="{{ route('web.categories') }}">{{ __('web/products.show_all') }}</a>
                    </div>
                @endif
            @endif
            
    </div>
</div>

@endsection