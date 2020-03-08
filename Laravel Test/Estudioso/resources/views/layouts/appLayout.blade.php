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
        <link rel="stylesheet" href=" {{ asset('css/appLayout.css') }}">
        <link rel="icon" href=" {{ asset('img/favicon.png') }}">
        @yield('title')
    </head>
    <body>
        <div class="row justify-content-center ml-2">
            <div class="d-flex float-left col">
                <img src="{{ asset('img/favicon.png') }}" alt="Icono App" class="logo float-left">
                <h2 class="header ml-2 float-left mt-3"> ESTUDIOSO </h2>
            </div>
            <div class="float-right mr-4 mt-4">
                
            </div>
        </div>
        <div class="container">
        </div>
    </body>
</html>