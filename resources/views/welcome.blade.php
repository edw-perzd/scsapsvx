<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('logo_contorno.png') }}" type="image/x-icon">

        <title>Sistema para la Gestión del Servicio de agua Potable - San Vicente Xiloxochitla</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid vh-100 d-flex flex-column justify-content-center align-items-center text-center">

            <img src="{{ asset('logo_contorno.png') }}" alt="Presidencia de Comunidad San Vicente Xiloxochitla" class="img-fluid mb-4" style="max-width: 100%; height: auto; max-height: 200px;">
    
            <h1 class="mb-4 fs-4 fs-md-2">Sistema para la Gestión del Servicio de agua Potable - San Vicente Xiloxochitla</h1>
    
            @if (Route::has('login'))
                @auth
                    @if(Auth::user()->roles['0']->id == 1)
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-lg">Ir al inicio</a>
                    @elseif(Auth::user()->roles['0']->id == 2)
                        <a href="{{ route('cobros.index') }}" class="btn btn-primary btn-lg">Ir al inicio</a>
                    @else
                        <a href="{{ route('beneficiarios.index') }}" class="btn btn-primary btn-lg">Ir al inicio</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Ingresar</a>
                @endauth
            @endif

        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
