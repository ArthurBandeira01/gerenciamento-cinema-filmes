<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JetiMovie - @yield('title')</title>
        <meta name="author" content="Jetmovie">
        <meta name="keywords" content="Cinema, filme, lançamento, ingressos, tickets">
        <meta name="description" content="@yield('description')">
        <meta name="subject" content="Jetmovie - o seu sistema de cinema definitivo">
        <meta name="robots" content="index,follow">
        <meta name="googlebot" content="index,follow">
        <meta name="rating" content="General">
        <link rel="shortcut icon" type="image-x/png" href="{{ url('img/favicon.ico') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a7cf753026.js" crossorigin="anonymous"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{url('css/global.css')}}">
        <link rel="stylesheet" href="{{url('css/admin/style.css')}}">
    </head>
    <body class="antialiased body-admin text-center" id="app">
        <div class="flex flex-col justify-center align-items-center centraliza">
            <div class="px-8 py-6 mx-4 bg-white shadow-md rounded-lg">
                <div class="logo flex items-center justify-center">
                    @if(isset($tenantVerify)) <a class="" href="{{route('homeTenant')}}">
                    @else <a class="" href="{{route('home')}}">
                    @endif
                        <img class="" src="{{url('img/site/jetmovie.png')}}" alt="Jetmovie" title="Jetmovie">
                    </a>
                </div>
                @include('components.success')
                @include('components.error')
                @yield('content')
            </div>
        </div>

        <script src="{{ url('js/jquery.js') }}"></script>
        <script src="{{ url('js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('js/messages_pt_BR.min.js') }}"></script>
        <script src="{{ url('js/site/functions.js') }}"></script>
        @yield('scripts')
    </body>
</html>
