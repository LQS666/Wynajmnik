<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="none" onload="this.media='all'">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <title>@yield('title', 'Strona główna') - Wynajmnik.pl</title>
    </head>

    <body>
        <div>
            <header>
                <nav class="hidden lg:flex w-full fixed z-50 items-center justify-between bg-white py-6 px-12 shadow-lg">
                    <div class="">
                        <a href="{{ url('/') }}" class="flex mt-0 text-purple-second hover:text-indigo-700 transition">
                            <span class="font-semibold text-xl tracking-tight">Wynajmnik.pl</span>
                        </a>
                    </div>
                    <div class="flex items-center w-auto">
                        <div class="text-sm flex-grow">
                            <a href="#" class="inline-block mt-0 mr-8 text-purple-second hover:text-indigo-700 transition">
                            Ogłoszenia
                            </a>
                        </div>
                        <div class="text-sm flex-grow">
                            <a href="#" class="inline-block mt-0 mr-8 text-purple-second hover:text-indigo-700 transition">
                            Mapa
                            </a>
                        </div>
                        <div class="text-sm flex-grow">
                            <a href="{{ route('account.login') }}" class="inline-block mt-0 mr-8 text-purple-second hover:text-indigo-700 transition">
                            Logowanie
                            </a>
                        </div>
                        <div>
                            <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-purple-second border-purple-second hover:border-indigo-700 hover:text-indigo-700 transition mt-4 lg:mt-0"><i class="fa fa-plus mr-3" aria-hidden="true"></i>Dodaj przedmiot</a>
                        </div>
                    </div>
                </nav>
            </header>

            <section>
                @yield('content')
            </section>

            <footer class="bg-purple-second text-white text-sm">
                <div class="container mx-auto flex flex-row items-center justify-center py-3" style="height:60px;">
                    <div>
                        <span class="font-semibold tracking-tight">Wynajmnik.pl 2019 </span>Wszelkie prawa zastrzeżone
                    </div>
                </div>
            </footer>
        </div>
        @include('sweetalert::alert')
    </body>
</html>

<script src="{{ asset('/js/app.js') }}" type="module"></script>
