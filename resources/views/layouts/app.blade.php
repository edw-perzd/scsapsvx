<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- CSS BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- <title>{{ config('app.name', 'SGSAPSVX') }}</title> -->
        <title>@yield('title', 'SGSAPSVX')</title>

        <style>
            .navbar-brand img {
                width: 30px;
                height: 30px;
            }
            .card h3 {
                font-size: 2rem;
            }
            .card p {
                font-size: 1.25rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        @include('layouts.navigation')
        <div class="min-h-screen bg-gray-100">


            <main>
                {{ $slot }}
            </main>
        </div>

        @yield('content')

        <!-- JAVASCRIPT BOOTSTRAP -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </body>
</html>
