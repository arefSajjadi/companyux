<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('favicon.ico')}}">

    @include('layouts.master.metaTag')

    @include('layouts.assets.css')

    @yield('styles')

</head>
<body>
<div id="app">
    @include('layouts.navigation.navigation')

    <main class="min-vh-100">
        @yield('content')
    </main>

    @include('layouts.footer')
</div>
</body>

@include('layouts.assets.js')

@yield('scripts')

</html>
