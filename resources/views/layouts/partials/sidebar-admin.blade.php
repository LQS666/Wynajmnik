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
        <hr class="my-6">
        <li class="sidenav-list__item">
            <a href="{{ route('admin.categories') }}" {!! (request()->routeIs('admin.categories') ||
                request()->routeIs('admin.categories')) ? 'class="active"' : '' !!}>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M15,8H8V5L4,9l4,4v-3h7c1.654,0,3,1.346,3,3s-1.346,3-3,3h-3v2h3c2.757,0,5-2.243,5-5S17.757,8,15,8z" />
                </svg>
                <span>{{ __('base.categories') }}</span>
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
