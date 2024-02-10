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
        <link rel="shortcut icon" type="image-x/png" href="{{ URL::asset('img/favicon.ico') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a7cf753026.js" crossorigin="anonymous"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{URL::asset('css/global.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/admin/style.css')}}">
    </head>
    <body class="antialiased body-site text-center" id="app">
        @include('components.admin.painel.header')
        <div class="flex h-screen bg-gray-100">

            @include('components.admin.painel.aside')

            <!-- Main Content -->
            <div class="flex w-full flex-1 flex-col overflow-y-auto">
                <div class="mt-5 text-center flex flex-col items-center justify-center">
                    @include('components.success')
                    @include('components.error')
                    @yield('content')
                </div>

            </div>
        </div>

        <script src="{{ URL::asset('js/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ URL::asset('js/messages_pt_BR.min.js') }}"></script>
        <script src="{{URL::asset('js/admin/functions.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('scripts')
    </body>
</html>
