@section('mobile-menu')

<ul class="nav__list">
    @if ($user->admin)
        <li class="nav__list-item">
            <a href="{{ route('admin.profile') }}">{{ __('base.myAccount') }}</a>
        </li>
        <li class="nav__list-item">
            <a href="{{ route('logout') }}">{{ __('base.logout') }}</a>
        </li>
    @else
        <li class="nav__list-item">
            <a href="{{ route('web.products') }}">{{ __('base.offers') }}</a>
        </li>
        <li class="nav__list-item">
            <a href="{{ route('my-account.product-new') }}">{{ __('base.addItem') }}</a>
        </li>
        <li class="nav__list-item">
            <a href="{{ route('my-account.profile') }}">{{ __('base.myAccount') }}</a>
        </li>
        <li class="nav__list-item">
            <a href="{{ route('logout') }}">{{ __('base.logout') }}</a>
        </li>
    @endif
</ul>

@endsection
