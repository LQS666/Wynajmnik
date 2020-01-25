@section('mobile-menu')

<ul class="nav__list">
    <li class="nav__list-item">
        <a href="{{ route('web.products') }}">{{ __('base.offers') }}</a>
    </li>
    <li class="nav__list-item">
        <a href="{{ route('login') }}">{{ __('base.login') }}</a>
    </li>
</ul>

@endsection
