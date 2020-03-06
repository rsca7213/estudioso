<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href=" {{ asset('css/access/access.css') }}">
        <link rel="icon" href=" {{ asset('img/favicon.png') }}">
        @yield('title')
    </head>
    <body>
        <div class="container-flex">
            <a class="row d-flex" href="/">
                <img src="{{ asset('img/favicon.png') }}" alt="Icono App" class="col-1 pl-4">
                <h2 class="header pt-3 col-2"> ESTUDIOSO </h2>
            </a>
        @yield('content')
        </div>
    </body>
</html>