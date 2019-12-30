@section('navigation')

<div class="hidden lg:block">
    <nav class="flex fixed w-full z-50 items-center justify-between bg-white py-3 px-12 shadow-md">
        <div>
            <a href="{{ url('/') }}" class="mt-0 text-purple-second hover:text-indigo-700 transition">
                <img style="height: 50px;" src="{{ asset('/assets/images/logo_purple.png')}}" />
            </a>
        </div>
        <div class="flex items-center w-auto">
            <div class="text-sm flex-grow">
                <a href="#"
                    class="inline-block mt-0 mr-8 text-gray-500 hover:text-gray-800 transition">{{ __('base.offers') }}</a>
            </div>
            <div class="text-sm flex-grow">
                <a href="#"
                    class="inline-block mt-0 mr-8 text-gray-500 hover:text-gray-800 transition">{{ __('base.map') }}</a>
            </div>
            @guest
            <div class="text-sm flex-grow">
                <a href="{{ route('login') }}"
                    class="inline-block mt-0 mr-8 text-gray-500 hover:text-gray-800 transition">{{ __('base.login') }}</a>
            </div>
            @endguest
            @auth
            <div>
                <a href="#"
                    class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-purple-second bg-purple-second hover:border-purple-second transition mt-4 lg:mt-0 hover:bg-white hover:text-purple-second">
                    <i class="fa fa-plus mr-3" aria-hidden="true"></i>
                    {{ __('base.addItem') }}
                </a>
            </div>
            <div class="relative hidden sm:block sm:ml-6 group">
                <button id="mobileMenu"
                    class="relative z-10 block h-10 w-10 rounded-full overflow-hidden border-2 border-purple-second focus:outline-none">
                    @if ($user->avatar)
                        <img class="h-full w-full object-cover" src="{{ $user->avatarUrl }}" alt="Avatar">
                    @else
                        <img class="h-full w-full object-cover" src="{{ asset('/assets/images/avatar.jpg') }}" alt="Avatar">
                    @endif
                </button>
                <div class="hidden group-hover:block absolute right-0 w-56 py-3 bg-white rounded-lg shadow-xl text-sm">
                    <span class="block px-4 pt-6 text-black text-lg font-semibold rounded">
                        {{ $user['name'] . ' ' . $user['surname'] }}
                    </span>
                    <span class="block px-4 pb-4 text-black rounded font-normal">
                        {{ $user['email'] }}
                    </span>
                    <div class="w-full border-gray-200 border-b-2"></div>
                    <a href="{{ route('my-account.products') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded font-normal">{{ __('base.myItems') }}</a>
                    <a href="{{ route('my-account.offer') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded font-normal">{{ __('base.myOffers') }}</a>
                    <div class="w-full border-gray-200 border-b-2"></div>
                    {{-- <a href="{{ route('my-account.profile') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded
                    font-normal">{{ __('base.myAccount') }}</a> --}}
                    <a href="{{ route('my-account.profile') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded font-normal">{{ __('base.myAccount') }}</a>
                    <div class="w-full border-gray-200 border-b-2"></div>
                    <a href="{{ route('logout') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded font-normal">{{ __('base.logout') }}</a>
                </div>
            </div>
            @endauth
        </div>
    </nav>
</div>

<nav>
    <div class="menu-logo lg:hidden">
        <a href="{{ url('/') }}">
            <span>{{ __('base.siteName') }}</span>
        </a>
        <div class="menu-icon">
            <span class="menu-icon__line menu-icon__line-left"></span>
            <span class="menu-icon__line"></span>
            <span class="menu-icon__line menu-icon__line-right"></span>
        </div>
    </div>
    <div class="nav">
        <div class="nav__content">
            <ul class="nav__list">
                @auth
                <li class="nav__list-item">
                    <a href="#">{{ __('base.addItem') }}</a>
                </li>
                @endauth
                <li class="nav__list-item">
                    <a href="#">{{ __('base.offers') }}</a>
                </li>
                <li class="nav__list-item">
                    <a href="#">{{ __('base.map') }}</a>
                </li>
                @auth
                <li class="nav__list-item">
                    <a href="{{ route('my-account.profile') }}">{{ __('base.myAccount') }}</a>
                </li>
                @endauth
                @guest
                <li class="nav__list-item">
                    <a href="{{ route('login') }}">{{ __('base.login') }}</a>
                </li>
                @else
                <li class="nav__list-item">
                    <a href="{{ route('logout') }}">{{ __('base.logout') }}</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@endsection
