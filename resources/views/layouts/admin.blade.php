<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    media="none" onload="this.media='all'">
  <link rel="stylesheet" href="{{ asset('/assets/css/app.css?v=1') }}">
  <title>@yield('title', __('base.title')) - {{ __('base.title') }}</title>
</head>

<body style="min-height:100vh;">
  <div class="hidden lg:block">
    <nav class="flex fixed w-full z-50 items-center justify-between bg-white py-3 px-12 shadow-md">
      <div>
        <a href="{{ url('/') }}" class="mt-0 text-purple-second hover:text-indigo-700 transition">
          <span class="font-semibold text-xl tracking-tight">{{ __('base.title') }}</span>
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
            <img class="h-full w-full object-cover" src="{{ asset('/assets/images/avatar.jpg') }}" alt="Avatar">
          </button>
          <div class="hidden group-hover:block absolute right-0 w-56 bg-white rounded-lg shadow-xl text-sm">
            <span class="block px-4 pt-6 text-black text-lg font-semibold rounded">
              Andrzej Nowak
            </span>
            <span class="block px-4 pb-4 text-black rounded font-normal">
              andrzejnowak@test.pl
            </span>
            <div class="w-full border-gray-200 border-b-2"></div>
            <a href="#"
              class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded font-normal">{{ __('base.myItems') }}</a>
            <a href="#"
              class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded font-normal">{{ __('base.myOffers') }}</a>
            <div class="w-full border-gray-200 border-b-2"></div>
            {{-- <a href="{{ route('my-account.profile') }}"
            class="block px-4 py-2 text-gray-700 hover:bg-purple-second hover:text-white rounded
            font-normal">{{ __('base.myAccount') }}</a> --}}
            <a href="{{ route('my-account.password-change') }}"
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

  <div class="grid-container">
    <aside class="sidenav">
      <ul class="sidenav__list">
        <li class="sidenav__list-item">
          <a href="#" class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M13 7L11 7 11 11 7 11 7 13 11 13 11 17 13 17 13 13 17 13 17 11 13 11z" />
              <path
                d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z" />
            </svg>
            <span>Dodaj przedmiot</span>
          </a>
        </li>
        <hr class="my-6">
        <li class="sidenav__list-item">
          <a href="#" class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path
                d="M20,9l-4-4v3H9c-2.757,0-5,2.243-5,5s2.243,5,5,5h3v-2H9c-1.654,0-3-1.346-3-3s1.346-3,3-3h7v3L20,9z" />
            </svg>
            <span>Złożone oferty</span>
          </a>
        </li>
        <li class="sidenav__list-item">
          <a href="#" class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path
                d="M15,8H8V5L4,9l4,4v-3h7c1.654,0,3,1.346,3,3s-1.346,3-3,3h-3v2h3c2.757,0,5-2.243,5-5S17.757,8,15,8z" />
            </svg>
            <span>Moje przedmioty</span>
          </a>
        </li>
        <hr class="my-6">
        <li class="sidenav__list-item">
          <a href="#" class="active">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path
                d="M3,21c0,0.553,0.448,1,1,1h16c0.553,0,1-0.447,1-1v-1c0-3.714-2.261-6.907-5.478-8.281C16.729,10.709,17.5,9.193,17.5,7.5 C17.5,4.468,15.032,2,12,2C8.967,2,6.5,4.468,6.5,7.5c0,1.693,0.771,3.209,1.978,4.219C5.261,13.093,3,16.287,3,20V21z M8.5,7.5 C8.5,5.57,10.07,4,12,4s3.5,1.57,3.5,3.5S13.93,11,12,11S8.5,9.43,8.5,7.5z M12,13c3.859,0,7,3.141,7,7H5C5,16.141,8.14,13,12,13z" />
            </svg>
            <span>Profil</span>
          </a>
        </li>
        <li class="sidenav__list-item">
          <a href="#" class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M16 12h2v3h-2z" />
              <path
                d="M21 7h-1V4a1 1 0 0 0-1-1H5c-1.206 0-3 .799-3 3v11c0 2.201 1.794 3 3 3h16a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zM5 5h13v2H5.012C4.55 6.988 4 6.805 4 6s.55-.988 1-1zm15 13H5.012C4.55 17.988 4 17.805 4 17V8.833c.346.115.691.167 1 .167h15v9z" />
            </svg>
            <span>Płatności</span>
          </a>
        </li>
        <hr class="my-6">
        <li class="sidenav__list-item">
          <a href="#" class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path
                d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z" />
              <path d="M11 2h2v10h-2z" /></svg>
            <span>Wyloguj się</span>
          </a></li>
      </ul>
    </aside>

    <main class="main">
      <div class="sidebar-icon">
        <span>Menu</span>
      </div>
      <div class="main-header">
        <div class="main-header__heading">
          <span>Drogi Użytkowniku!</span>
          <p>Dziękujemy za zainteresowanie naszą platformą... lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem
            ipsum</p>
          <p>Sprawdź proszę nasz regulamin... lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
        </div>
      </div>

      <div class="main-statistics-panel">
        <div class="statistics-panel">
          <div class="statistics-panel__icon">Złożonych ofert</div>
          <div class="statistics-panel__info">10</div>
        </div>
        <div class="statistics-panel">
          <div class="statistics-panel__icon">Dokonanych transakcji</div>
          <div class="statistics-panel__info">10</div>
        </div>
        <div class="statistics-panel">
          <div class="statistics-panel__icon">Aktualnie wystawionych ofert</div>
          <div class="statistics-panel__info">10</div>
        </div>
        <div class="statistics-panel">
          <div class="statistics-panel__icon">Ilość ofert w serwisie</div>
          <div class="statistics-panel__info">10</div>
        </div>
      </div>

      <div class="main-content-panels">
        @yield('content')
      </div>
    </main>
  </div>

  @include('sweetalert::alert')
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('/assets/js/app.js') }}" type="module"></script>