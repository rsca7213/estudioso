<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> Estudioso | Página de Inicio </title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href=" {{ asset('css/welcome/welcome.css') }}">
        <link rel="icon" href=" {{ asset('img/favicon.png') }}">
    </head>
    <body>
        <div class="container-flex">
            <div class="row d-flex">
                <img src="{{ asset('img/favicon.png') }}" alt="Icono App" class="col-1 pl-4">
                <h2 class="header pt-3 col-2"> ESTUDIOSO </h2>
                <div class="col-9 mt-4">
                    @if (Route::has('login'))
                    @auth
                        <a href="{{ route('home') }}" class="btn btn-primary mr-4 float-right"> Inicio </a>
                        @else
                            <div class="float-right">
                                <a href="{{ route('login') }}" class="btn btn-secondary mr-2"> Iniciar Sesión </a>
                                <a href="{{ route('register') }}" class="btn btn-primary mr-4"> Registrarse </a>
                            </div>                           
                    @endauth
                @endif
                </div>
            </div>
            <div class="row">
                <h3 class="col-8 offset-2 text-center memo pt-4 pb-4">
                    ¡Estudioso es una aplicación web en la que podrás gestionar
                    tus planes de evaluación académicos de una manera rápida y sencilla!
                </h3>
            </div>
            <div class="row justify-content-center pt-4">
                <img src="{{ asset('img/welcome/image1.svg') }}" alt="img1" class="col-2">
                <img src="{{ asset('img/welcome/image2.svg') }}" alt="img2" class="col-2 mx-4">
                <img src="{{ asset('img/welcome/image3.svg') }}" alt="img3" class="col-2">
            </div>
            <div class="row justify-content-center mt-4 pt-4">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg"> ¡Registrarse Ahora! </a>
            </div>
        </div>
    </body>
</html>
