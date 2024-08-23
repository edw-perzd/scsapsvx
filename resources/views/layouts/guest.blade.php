<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ asset('logo_contorno.png') }}" type="image/x-icon">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <title>{{ config('app.name', 'SGSPSVX') }}</title>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

    </head>
    <body>
        <div class="navbar-dark bg-primary">
            <ul class="nav navbar justify-content-center navbar-expand-md navbar-dark bg-primary container">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('login') }}">
                        <img src="{{ asset('logo_contorno.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top mx-1">
                        Sistema para la Gestion del Servicio de Agua Potable - San Vicente Xiloxochitla
                    </a>
                </li>
            </ul>
        </div>
        {{ $slot }}


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
