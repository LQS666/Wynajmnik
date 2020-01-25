@section('navigation')

<div class="hidden lg:block">
    <nav class="flex fixed w-full z-50 items-center justify-between bg-white py-3 px-12 shadow-md">
        <div>
            <a href="{{ url('/') }}" class="mt-0 text-purple-second hover:text-indigo-700 transition">
                <img style="height: 50px;" src="{{ asset('/assets/images/brand/logo_purple.png')}}" />
            </a>
        </div>
        <div class="flex items-center w-auto">
            <div class="text-sm flex-grow">
                <a href="{{ route('web.categories') }}"
                    class="inline-block mt-0 mr-8 text-gray-500 hover:text-gray-800 transition">{{ __('base.offers') }}</a>
            </div>
            @guest
            <div class="text-sm flex-grow">
                <a href="{{ route('login') }}"
                    class="inline-block mt-0 mr-8 text-gray-500 hover:text-gray-800 transition">{{ __('base.login') }}</a>
            </div>
            @endguest
            @auth
            @if (!$user->admin)
            <div>
                <a href="{{ route('my-account.product-new') }}"
                    class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-purple-second bg-purple-second hover:border-purple-second transition mt-4 lg:mt-0 hover:bg-white hover:text-purple-second">
                    <i class="fa fa-plus mr-3" aria-hidden="true"></i>
                    {{ __('base.addItem') }}
                </a>
            </div>
            @else
            <div>
                <a href="{{ route('admin.profile') }}"
                    class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-purple-second bg-purple-second hover:border-purple-second transition mt-4 lg:mt-0 hover:bg-white hover:text-purple-second">
                    {{ __('base.panel') }}
                </a>
            </div>
            @endif
            <div class="relative hidden sm:block sm:ml-6 group">
                <button id="mobileMenu"
                    class="relative z-10 block h-10 w-10 rounded-full overflow-hidden border-2 border-purple-second focus:outline-none">
                    @if ($user->avatar)
                        <img class="h-full w-full object-cover" src="{{ $user->avatarUrl }}" alt="Avatar">
                    @else
                        <img class="h-full w-full object-cover" src="{{ asset('/assets/images/avatar.png') }}" alt="Avatar">
                    @endif
                </button>
                @section('context-menu')
                @if ($user->admin)
                    @include('layouts.partials.context-menu-admin')
                @else
                    @include('layouts.partials.context-menu')
                @endif
                @show
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
        @section('mobile-menu')
        @auth
            @include('layouts.partials.mobile-menu-auth')
        @else
            @include('layouts.partials.mobile-menu')
        @endauth
        @show
        </div>
    </div>
</nav>

@endsection
