<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/scss/theme.scss', 'resources/js/theme.js'])

    @stack('style')
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <x-nav-link url="{{ route('page.index') }}" name="LARAVEL"></x-nav-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @include('templates.navbar-nav')
        </div>
    </div>
</nav>

<div id="app">
   <main class="py-3"> @yield('content') </main>
</div>

@stack('script')

</body>
</html>
