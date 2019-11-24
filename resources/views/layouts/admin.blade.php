@extends('layouts.base')

@section('content')

<div class="grid-container">

    @section('sidebar')
    @include('layouts.partials.sidebar')
    @show

    <main class="main">
        <div class="sidebar-icon">
            <span>Menu</span>
        </div>
        {{-- <div class="main-header">
            <div class="main-header__heading">
                <span>Drogi Użytkowniku!</span>
                <p>Dziękujemy za zainteresowanie naszą platformą... lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem
                    ipsum</p>
                <p>Sprawdź proszę nasz regulamin... lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
            </div>
        </div> --}}

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

        @yield('profile')
    </main>
</div>

@endsection

<script>
window.addEventListener('DOMContentLoaded', () => {
    const menuIconEl = document.querySelector('.sidebar-icon');
    const sidenavEl = document.querySelector('.sidenav');

    const animateSidebar = function init() {
        menuIconEl.addEventListener('click', () => {
            if (sidenavEl.classList.contains('active')) {
                sidenavEl.classList.remove('active');
            } else {
                sidenavEl.classList.add('active');
            }
        });
    };
    animateSidebar();
});
</script>
@yield('js')