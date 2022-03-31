<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@hasSection('title')
    <title>@yield('title')</title>
@else
    <title>{{ config('app.name') }}</title>
@endif

@hasSection('description')
    <meta name="description" content="@yield('description')">
@else
    <meta name="description" content="{{ config('app.name') }}">
@endif
