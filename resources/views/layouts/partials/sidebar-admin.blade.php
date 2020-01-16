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
