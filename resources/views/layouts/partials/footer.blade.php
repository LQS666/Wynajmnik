@section('footer')

<footer>
    <div class="footer-content container">
        <div class="footer-content__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="footer-content__item__logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('/assets/images/brand/logo_white.png')}}" alt="{{ __('web/footer.title') }}" />
                </a>
                <p>
                    {{ __('web/footer.desc') }}
                </p>
            </div>
        </div>
        @if (count($sites) > 0)
            @foreach ($sites as $group => $site)
                <div class="footer-content__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <p class="footer-content__item__subtitle">{{ $group }}</p>
                    <ul class="list-reset mb-6">
                        @foreach ($site as $s)
                            <li class="footer-content__item__li">
                                <a href="{{ $s['link'] }}">{{ $s['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @endif
    </div>

    <div class="footer-content__copyrights">
        <div>
            <span>
                {{ __('base.siteName') }} {{ date('Y') }}
            </span>
            <span>
                {{ __('base.rights') }}
            </span>
        </div>
    </div>
</footer>

@endsection
