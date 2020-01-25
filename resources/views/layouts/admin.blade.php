@extends('layouts.panel')

@section('content')

<div class="grid-container">

    @section('sidebar')
    @if ($user->admin)
        @include('layouts.partials.sidebar-admin')
    @else
        @include('layouts.partials.sidebar')
    @endif
    @show

    <main class="main">
        <div class="sidebar-icon">
            <span>Menu</span>
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
