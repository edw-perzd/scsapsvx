<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ asset('logo_contorno.png') }}" type="image/x-icon">

        <!-- CSS BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
            #map {
            height: 200px; /* Ajusta la altura según tus necesidades */
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

        
        <!-- Footer -->
        <footer class="bg-dark text-light py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Sobre SGSAPSVX</h5>
                        <p>El Sistema para la Gestion del Servicio de Agua Potable de San Vicente Xiloxochitla es una herramienta informática que facilita las tareas administrativas relacionadas con el cobro del servicio de agua potable de la comunidad.</p>
                    </div>
                    <div class="col-md-3">
                        <h5>Enlaces</h5>
                        <ul class="list-unstyled">
                            @if(Auth::user()->roles['0']->id == 1)
                                <li><a href="{{ route('admin.users.index') }}" class="text-light">Inicio</a></li>
                            @elseif(Auth::user()->roles['0']->id == 2)
                                <li><a href="{{ route('cobros.index') }}" class="text-light">Inicio</a></li>
                            @else
                                <li><a href="{{ route('beneficiarios.index') }}" class="text-light">Inicio</a></li>
                            @endif
                            @can('cobros.index')
                                <li><a href="{{ route('cobros.index') }}" class="text-light">Cobros</a></li>
                            @endcan
                            @can('beneficiarios.index')
                                <li><a href="{{ route('beneficiarios.index') }}" class="text-light">Beneficiarios</a></li>
                            @endcan
                            @can('admin.users.index')
                                <li><a href="{{ route('admin.users.index') }}" class="text-light">Usuarios</a></li>
                            @endcan
                            @can('reportes.index')
                                <li><a href="{{ route('reportes.index') }}" class="text-light">Reportes</a></li>
                            @endcan
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Contacto</h5>
                        <ul class="list-unstyled">
                            <li><a href="mailto:info@example.com" class="text-light">info@example.com</a></li>
                            <li><a href="tel:+1234567890" class="text-light">+123 456 7890</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center py-3">
                &copy; {{ date('Y') }} Presidencia de comunidad - San Vicente Xiloxochitla. Todos los derechos reservados.
            </div>
        </footer>
        <!-- JAVASCRIPT BOOTSTRAP -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </body>
</html>
