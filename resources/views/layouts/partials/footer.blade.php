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
        <div class="footer-content__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <p class="footer-content__item__subtitle">{{ __('web/footer.info') }}</p>
            <ul class="list-reset mb-6">
                <li class="footer-content__item__li">
                    <a href="#">{{ __('web/footer.faq') }}</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">{{ __('web/footer.reg') }}</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">{{ __('web/footer.policy') }}</a>
                </li>
            </ul>
        </div>
        <div class="footer-content__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <p class="footer-content__item__subtitle">{{ __('web/footer.social') }}</p>
            <ul class="list-reset mb-6">
                <li class="footer-content__item__li">
                    <a href="#">{{ __('web/footer.facebook') }}</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">{{ __('web/footer.instagram') }}</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">{{ __('web/footer.twitter') }}</a>
                </li>
            </ul>
        </div>
        <div class="footer-content__item" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <p class="footer-content__item__subtitle">{{ __('web/footer.title') }}</p>
            <ul class="list-reset mb-6">
                <li class="footer-content__item__li">
                    <a href="#">{{ __('web/footer.howweworks') }}</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">{{ __('web/footer.about') }}</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">{{ __('web/footer.contact') }}</a>
                </li>
            </ul>
        </div>
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