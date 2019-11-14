<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="none" onload="this.media='all'">
        <link rel="stylesheet" href="{{ asset('/assets/css/app.css?v=1') }}">
        <title>@yield('title', __('view.base.title')) - {{ __('view.base.title') }}</title>
    </head>

    <body>
        <header>
            <div class="hidden lg:block">
                <nav class="flex w-full fixed z-50 items-center justify-between bg-white py-6 px-12 shadow-lg">
                    <div>
                        <a href="{{ url('/') }}" class="mt-0 text-purple-second hover:text-indigo-700 transition">
                            <span class="font-semibold text-xl tracking-tight">{{ __('view.base.title') }}</span>
                        </a>
                    </div>
                    <div class="flex items-center w-auto">
                        <div class="text-sm flex-grow">
                            <a href="#" class="inline-block mt-0 mr-8 text-purple-second hover:text-indigo-700 transition">{{ __('view.base.offers') }}</a>
                        </div>
                        <div class="text-sm flex-grow">
                            <a href="#" class="inline-block mt-0 mr-8 text-purple-second hover:text-indigo-700 transition">{{ __('view.base.map') }}</a>
                        </div>
                        @guest
                        <div class="text-sm flex-grow">
                            <a href="{{ route('account.login') }}" class="inline-block mt-0 mr-8 text-purple-second hover:text-indigo-700 transition">{{ __('view.base.login') }}</a>
                        </div>
                        @endguest
                        @auth
                        <div>
                            <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-purple-second border-purple-second hover:border-indigo-700 transition mt-4 lg:mt-0 hover:bg-indigo-500 hover:text-white">
                                <i class="fa fa-plus mr-3" aria-hidden="true"></i>
                                {{ __('view.base.addItem') }}
                            </a>
                        </div>
                        <div class="relative hidden sm:block sm:ml-6 group">
                            <button id="mobileMenu" class="relative z-10 block h-10 w-10 rounded-full overflow-hidden border-2 border-purple-second focus:outline-none">
                                <img class="h-full w-full object-cover" src="{{ asset('/assets/images/avatar.jpg') }}" alt="Avatar">
                            </button>
                            <div class="hidden group-hover:block absolute right-0 w-48 bg-white rounded-lg shadow-xl text-sm">
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-500 hover:text-white rounded font-normal">{{ __('view.base.myItems') }}</a>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-500 hover:text-white rounded font-normal">{{ __('view.base.myOffers') }}</a>
                                <div class="w-full border-gray-200 border-b-2"></div>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-500 hover:text-white rounded font-normal">{{ __('view.base.myAccount') }}</a>
                                <a href="{{ route('password.change') }}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-500 hover:text-white rounded font-normal">{{ __('view.base.passwordChange') }}</a>
                                <div class="w-full border-gray-200 border-b-2"></div>
                                <a href="{{ route('account.logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-500 hover:text-white rounded font-normal">{{ __('view.base.logout') }}</a>
                            </div>
                        </div>
                        @endauth
                    </div>
                </nav>
            </div>
            <nav>
                <div class="menu-logo lg:hidden">
                    <a href="{{ url('/') }}">
                        <span>{{ __('view.base.siteName') }}</span>
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
                            @auth <li class="nav__list-item"><a href="#">{{ __('view.base.addItem') }}</a></li> @endauth
                                  <li class="nav__list-item"><a href="#">{{ __('view.base.offers') }}</a></li>
                                  <li class="nav__list-item"><a href="#">{{ __('view.base.map') }}</a></li>
                            @auth <li class="nav__list-item"><a href="#">{{ __('view.base.myAccount') }}</a></li> @endauth

                            @guest
                                <li class="nav__list-item"><a href="{{ route('account.login') }}">{{ __('view.base.login') }}</a></li>
                            @else
                                <li class="nav__list-item"><a href="{{ route('account.logout') }}">{{ __('view.base.logout') }}</a></li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <section style="padding-top:80px">
            @yield('content')
        </section>

        <footer class="bg-purple-second text-white text-sm">
            <div class="container mx-auto flex flex-row items-center justify-center py-3" style="height:60px;">
                <div>
                    <span class="font-semibold tracking-tight">{{ __('view.base.siteName') }} {{ date('Y') }} </span>{{ __('view.base.rights') }}
                </div>
            </div>
        </footer>

        @include('sweetalert::alert')
    </body>
</html>
<script src="{{ asset('/assets/js/app.js') }}" type="module"></script>
