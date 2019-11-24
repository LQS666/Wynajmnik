<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('layouts.partials.meta')
    @include('layouts.partials.favicon')
    @include('layouts.partials.styles')
    @include('layouts.partials.analytics')

    <title>@yield('title', __('base.title')) - {{ config('app.name') }}</title>
</head>

<body>
    @section('navigation')
    @include('layouts.partials.navigation')
    @show

    @yield('content')

    @section('footer')
    @include('layouts.partials.footer')
    @show

    @yield('beforeScripts')
    @include('layouts.partials.scripts')
    @yield('scripts')

    @include('sweetalert::alert')
</body>

</html>