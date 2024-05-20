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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="{{url('css/global.css')}}">
        <link rel="stylesheet" href="{{url('css/site/style.css')}}">
    </head>
    <body class="antialiased body-site" id="app">
        <div class="flex justify-center items-center mt-24">
            <div class="bg-slate-900 shadow-md rounded-lg px-8 py-6 mx-4">
                <div class="flex items-center justify-center">
                    @if(isset($tenantVerify)) <a class="text-2xl text-red-500 font-semibold" href="{{route('homeTenant')}}">
                    @else <a class="text-2xl" href="{{route('home')}}">
                    @endif
                        <b>Jet</b>movie
                    </a>
                </div>
                @include('components.success')
                @include('components.error')
                @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
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
