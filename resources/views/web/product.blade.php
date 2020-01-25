@extends('layouts.base')

@section('title', __('web/product.title'))

@section('content')

<main class="product-view">
    <div class="product-view__gallery">
        <a href="{{ route('web.categories') }}" class="block mt-3">{{ __('web/product.goback') }}</a>
        <h3>{{ $product->name }}</h3>
        <div class="loader">
            <img class="loader__icon" src="{{ asset('/assets/images/brand/logo_icon.png')}}" />
            <p class="loading">{{ __('web/product.loading') }}</p>
        </div>
        <div class="container">
            <div class="synch-carousels">
                <div class="navigation child">
                    <div class="gallery">
                        @if (count($product['images']) > 0)
                            @foreach ($product['images'] as $image)
                                <div class="item">
                                    <img src="{{ $image['url'] }}" alt="">
                                </div>
                            @endforeach
                        @else
                            <div class="item">
                                <img src="{{ asset('/assets/images/item.jpeg')}}" alt="">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="main-photo child">
                    <div class="gallery2">
                        @if (count($product['images']) > 0)
                            @foreach ($product['images'] as $image)
                                <div class="item">
                                    <img src="{{ $image['url'] }}" alt="">
                                </div>
                            @endforeach
                        @else
                            <div class="item">
                                <img src="{{ asset('/assets/images/item.jpeg')}}" alt="">
                            </div>
                        @endif
                    </div>
                    <div class="nav-arrows">
                        <button class="arrow-left">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                clip-rule="evenodd">
                                <path
                                    d="M2.117 12l7.527 6.235-.644.765-9-7.521 9-7.479.645.764-7.529 6.236h21.884v1h-21.883z" />
                            </svg>
                        </button>
                        <button class="arrow-right">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                clip-rule="evenodd">
                                <path
                                    d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z" />
                            </svg>
                        </button>
                    </div>
                    <div class="photos-counter">
                        <span></span><span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-view__desc">
            @if (count($product['filterValues']) > 0)
                <div class="product-view__filters">
                    @foreach ($product['filterValues'] as $value)
                        <div class="product-view__filters__value">
                            {{ $value['filter']['name'] }}: <span>{{ $value['value'] }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
            <h4>{{ __('web/product.desc') }}</h4>
            <span>{!! $product->desc !!}</span>
            <h4 class="pt-12">{{ __('web/product.dates') }}</h4>
            <div id='calendar'></div>
        </div>
    </div>
    <div class="product-view__content">
        <div class="product-view__date">
            <span>{{ __('web/product.offer_added') }} {{ \Carbon\Carbon::parse($product->created_at)->format('d.m.Y') }}</span>
        </div>
        <div class="product-view__price">
            <span>{{ $product->price }} {{ __('web/product.price') }}</span>
        </div>
        <div class="product-view__details">
            <div class="flex justify-center">
                @if ($product->owner->avatar)
                <img class="border-2 border-purple-third rounded-full" style="width: 120px; height: 120px"
                    src="{{ $product->owner->avatarUrl }}" alt="Avatar">
                @else
                <img class="border-2 border-purple-third rounded-full" style="width: 120px; height: 120px"
                    src="{{ asset('/assets/images/avatar.png')}}" alt="Avatar">
                @endif
            </div>
            <span class="product-view__details__name">{{ $product->owner->name }}</span>
            <span class="product-view__details__date">{{ __('web/product.user_since') }}
                {{ \Carbon\Carbon::parse($product->owner->created_at)->format('d.m.Y') }}</span>
        </div>

        @if (!empty($product['owner']['email_contact']))
            <a href="mailto:{{ $product['owner']['email_contact'] }}" class="product-view__contact">
                <span>{{ __('web/product.message') }}</span>
            </a>
        @endif

        @auth
        @if (!$user->admin)
            @if ($user['id'] !== $product['owner']['id'])
                <form class="product-view__reservation" method="POST" action="{{ route('web.offer', ['product' => $product['slug']]) }}">
                    @csrf
                    <h4>{{ __('web/product.reservation') }}</h4>
                    <div>
                        <label>{{ __('web/product.amount') }}</label>
                        <input type="number" name="price" value="{{ old('amount', $product['price']) }}">
                    </div>
                    <div>
                        <label>{{ __('web/product.from') }}</label>
                        <input type="date" name="date_start" value="{{ old('date_start', date('Y-m-d')) }}">
                    </div>
                    <div>
                        <label>{{ __('web/product.to') }}</label>
                        <input type="date" name="date_end" value="{{ old('date_end', date('Y-m-d')) }}">
                    </div>
                    <div>
                        <label>{{ __('web/product.note') }}</label>
                        <textarea name="note">{{ old('note') }}</textarea>
                    </div>
                    <button type="submit" class="product-view__reservation__submit">{{ __('web/product.reservation_button') }}</button>
                </form>
            @else
                <div class="product-view__reservation">{{ __('web/product.you_are_the_owner') }}</div>
            @endif
        @endif
        @endauth

        @if (!empty($product['address']['latitude']) && !empty($product['address']['longitude']))
            <div class="product-view__map__title">{{ __('web/product.map') }}</div>
            <div class="product-view__map">
                <div id="map" class="h-64"></div>
                <script>
                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: {{ $product['address']['latitude'] }}, lng: {{ $product['address']['longitude'] }}},
                            zoom: 6,
                            disableDefaultUI: true
                        });
                        new google.maps.Marker({
                            position: {lat: {{ $product['address']['latitude'] }}, lng: {{ $product['address']['longitude'] }}},
                            map: map
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSr_vIX42l3b7Fll0dGkSymc-hczfA4C0&callback=initMap" async defer></script>
            </div>
        @endif
    </div>
</main>

@endsection
