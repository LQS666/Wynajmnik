@extends('layouts.base')

@section('title', __('web/product.title'))

@section('content')

{{-- <div class="container">
    {{ dd($product) }}
{{ dd($category) }}
</div> --}}

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
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="main-photo child">
                    <div class="gallery2">
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="" />
                        </div>
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="" />
                        </div>
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="" />
                        </div>
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="" />
                        </div>
                        <div class="item">
                            <img src="{{ asset('/assets/images/item.jpeg')}}" alt="" />
                        </div>
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
            <h4>{{ __('web/product.desc') }}</h4>
            <span>{!! $product->desc !!}</span>
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
                    src="{{ $product->owner->avatar }}" alt="Avatar">
                @else
                <img class="border-2 border-purple-third rounded-full" style="width: 120px; height: 120px"
                    src="{{ asset('/assets/images/avatar.png')}}" alt="Avatar">
                @endif
            </div>
            <span class="product-view__details__name">{{ $product->owner->name }}</span>
            <span class="product-view__details__date">{{ __('web/product.user_since') }}
                {{ \Carbon\Carbon::parse($product->owner->email_verified_at)->format('d.m.Y') }}</span>
        </div>
        <a href="" class="product-view__contact">
            <span>{{ __('web/product.message') }}</span>
        </a>
        <a href="{{ route('web.categories') }}" class="product-view__others">
            <span>{{ __('web/product.other_items') }}</span>
        </a>

        <form class="product-view__reservation" action="">
            <h4>{{ __('web/product.reservation') }}</h4>
            <div>	
                <label>{{ __('web/product.from') }}</label>		
                <input type="date" name="" value="2019-12-26">	
            </div>	
            <div>	
                <label>{{ __('web/product.to') }}</label>		
                <input type="date" name="" value="2019-12-26">	
            </div>
            <button type="submit" class="product-view__reservation__submit">{{ __('web/product.reservation_button') }}</button>
        </form>

        <div class="product-view__map__title">{{ __('web/product.map') }}</div>
        <div class="product-view__map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1533.3945083810524!2d16.921737224749837!3d52.40464562802438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x12916d24a02efb00!2sWy%C5%BCsza%20Szko%C5%82a%20Bankowa%20w%20Poznaniu!5e0!3m2!1spl!2spl!4v1579452815952!5m2!1spl!2spl"
                width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="">
            </iframe>
            <div class="map-panel">
            </div>
        </div>
    </div>
</main>


<script>

    const mapControl = document.querySelector('.map-panel');

    mapControl.addEventListener('click', function () {
        mapControl.classList.add('map-panel-hidden');
    });

</script>

@endsection