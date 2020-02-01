@section('sidebar')

<aside class="sidenav">
    <ul class="sidenav-list">
        @if ($user->avatar)
        <li class="sidenav-list__item">
            <div class="flex justify-center">
                <img class="border-2 border-purple-main" style="width: 120px; height: 120px" src="{{ $user->avatarUrl }}" alt="Avatar">
            </div>
        </li>
        @else
        <li class="sidenav-list__item">
            <div class="flex justify-center">
                <img class="border-2 border-purple-main" style="width: 120px; height: 120px" src="{{ asset('/assets/images/avatar.png')}}" alt="Avatar">
            </div>
        </li>
        @endif
        <li class="sidenav-list__item">
            <div class="flex pt-2 font-semibold text-gray-700 text-base justify-center items-center">
                <span>{{ __('base.welcome') }} {{ $user['name'] }}</span>
            </div>
        </li>
        <li class="sidenav-list__item">
            <div class="flex pl-2 py-0 font-semibold text-gray-500 text-sm items-center">
                <span>
                    {{ __('base.premium') }}: {{ $user['points'] }}
                </span>
                <a href="{{ route('my-account.payments') }}" class="pl-2">+</a>
            </div>
        </li>
        <hr class="my-6">
        <li class="sidenav-list__item">
            <a href="{{ route('my-account.product-new') }}" {!! request()->routeIs('my-account.product-new') ?
                'class="active"' : '' !!}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13 7L11 7 11 11 7 11 7 13 11 13 11 17 13 17 13 13 17 13 17 11 13 11z" />
                    <path
                        d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z" />
                </svg>
                <span>{{ __('base.addItem') }}</span>
            </a>
        </li>
        <hr class="my-6">
        <li class="sidenav-list__item">
            <a href="{{ route('my-account.products') }}" {!! (request()->routeIs('my-account.products') ||
                request()->routeIs('my-account.product')) ? 'class="active"' : '' !!}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M15,8H8V5L4,9l4,4v-3h7c1.654,0,3,1.346,3,3s-1.346,3-3,3h-3v2h3c2.757,0,5-2.243,5-5S17.757,8,15,8z" />
                </svg>
                <span>{{ __('base.myItems', ['count' => $counters['my-products'], 'free' => $counters['my-free-products']]) }}</span>
            </a>
        </li>
        <li class="sidenav-list__item">
            <a href="{{ route('my-account.my-offers') }}" {!! request()->routeIs('my-account.my-offers') ? 'class="active"' : ''
                !!}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M20,9l-4-4v3H9c-2.757,0-5,2.243-5,5s2.243,5,5,5h3v-2H9c-1.654,0-3-1.346-3-3s1.346-3,3-3h7v3L20,9z" />
                </svg>
                <span>{{ __('base.myOffers', ['count' => $counters['my-offers']]) }}</span>
            </a>
        </li>
        <li class="sidenav-list__item">
            <a href="{{ route('my-account.foreign-offers') }}" {!! request()->routeIs('my-account.foreign-offers') ? 'class="active"' : ''
                !!}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M20,9l-4-4v3H9c-2.757,0-5,2.243-5,5s2.243,5,5,5h3v-2H9c-1.654,0-3-1.346-3-3s1.346-3,3-3h7v3L20,9z" />
                </svg>
                <span>{{ __('base.foreignOffers', ['count' => $counters['foreign-offers']]) }}</span>
            </a>
        </li>
        <hr class="my-6">
        <li class="sidenav-list__item">
            <a href="{{ route('my-account.addresses') }}" {!! (request()->routeIs('my-account.addresses') ||
                request()->routeIs('my-account.address')) ? 'class="active"' : '' !!}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M12.707 2.293A.996.996 0 0 0 12 2H3a1 1 0 0 0-1 1v9c0 .266.105.52.293.707l9 9a.997.997 0 0 0 1.414 0l9-9a.999.999 0 0 0 0-1.414l-9-9zM12 19.586l-8-8V4h7.586l8 8L12 19.586z" />
                    <circle cx="7.507" cy="7.505" r="1.505" /></svg>
                <span>{{ __('base.myAddress', ['count' => $counters['my-addresses']]) }}</span>
            </a>
        </li>
        <li class="sidenav-list__item">
            <a href="{{ route('my-account.profile') }}" {!! request()->routeIs('my-account.profile') ? 'class="active"'
                : '' !!}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M3,21c0,0.553,0.448,1,1,1h16c0.553,0,1-0.447,1-1v-1c0-3.714-2.261-6.907-5.478-8.281C16.729,10.709,17.5,9.193,17.5,7.5 C17.5,4.468,15.032,2,12,2C8.967,2,6.5,4.468,6.5,7.5c0,1.693,0.771,3.209,1.978,4.219C5.261,13.093,3,16.287,3,20V21z M8.5,7.5 C8.5,5.57,10.07,4,12,4s3.5,1.57,3.5,3.5S13.93,11,12,11S8.5,9.43,8.5,7.5z M12,13c3.859,0,7,3.141,7,7H5C5,16.141,8.14,13,12,13z" />
                </svg>
                <span>{{ __('base.myAccount') }}</span>
            </a>
        </li>
        <li class="sidenav-list__item">
            <a href="{{ route('my-account.payments') }}" {!! (request()->routeIs('my-account.payments') ||
                request()->routeIs('my-account.payment')) ? 'class="active"' : '' !!}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M16 12h2v3h-2z" />
                    <path
                        d="M21 7h-1V4a1 1 0 0 0-1-1H5c-1.206 0-3 .799-3 3v11c0 2.201 1.794 3 3 3h16a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zM5 5h13v2H5.012C4.55 6.988 4 6.805 4 6s.55-.988 1-1zm15 13H5.012C4.55 17.988 4 17.805 4 17V8.833c.346.115.691.167 1 .167h15v9z" />
                </svg>
                <span>{{ __('base.payment') }}</span>
            </a>
        </li>
        <li class="sidenav-list__item">
            <a href="{{ route('my-account.points') }}" {!! (request()->routeIs('my-account.points') ||
                request()->routeIs('my-account.points')) ? 'class="active"' : '' !!}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z" />
                </svg>
                <span>{{ __('base.points') }}</span>
            </a>
        </li>
        <hr class="my-6">
        <li class="sidenav-list__item">
            <a href="{{ route('logout') }}" class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z" />
                    <path d="M11 2h2v10h-2z" /></svg>
                <span>{{ __('base.logout') }}</span>
            </a>
        </li>
    </ul>
</aside>

@endsection
