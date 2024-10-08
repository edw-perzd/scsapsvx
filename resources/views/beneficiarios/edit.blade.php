@section('title', 'Editar beneficiario')

<x-app-layout>
    <div class="container p-3 p-sm-5 my-5 text-center w-75 rounded bg-white">
            <h1 class="mb-5">Editar usuario</h1>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{route('beneficiarios.update', $beneficiario->id_beneficiario)}}" method="POST">

                @csrf

                @method('PUT')
                
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <label for="noTarjeta" class="form-label">No. de tarjeta</label>
                        <input class="form-control" type="number" name="noTarjeta" id="noTarjeta" placeholder="Escribe número de tarjeta" value="{{ old('noTarjeta', $beneficiario->tarjeta->numero_tarjeta) }}" required>
                    </div>
                    <div class="col-6 col-md-4">
                        <label for="noToma" class="form-label">No. de toma</label>
                        <input class="form-control" type="number" name="noToma" id="noToma" placeholder="Escribe número de toma" value="{{ old('noToma', $beneficiario->tarjeta->numeroToma_tarjeta) }}" required>
                    </div>
                    <div class="col-6 col-md-4">
                        @if($beneficiario->isTitular_beneficiario == true)
                            <input type="checkbox" class="btn-check" id="isTitular" name="isTitular" value=1 autocomplete="off" checked>
                        @else
                            <input type="checkbox" class="btn-check" id="isTitular" name="isTitular" value=1 autocomplete="off">
                        @endif
                        <label for="isTitular" class="btn btn-outline-success">Es titular</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Escribe nombre" value="{{ old('name', $beneficiario->nombre_beneficiario) }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="aPaterno" class="form-label">Apellido paterno</label>
                        <input class="form-control" type="text" name="aPaterno" id="aPaterno" placeholder="Escribe apellido paterno" value="{{ old('aPaterno', $beneficiario->aPaterno_beneficiario) }}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="aMaterno" class="form-label">Apellido materno</label>
                        <input class="form-control" type="text" name="aMaterno" id="aMaterno" placeholder="Escribe apellido materno" value="{{ old('aMaterno', $beneficiario->aMaterno_beneficiario) }}" readonly required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 my-2">
                        <label for="latitude" class="form-label">Latitud</label>
                        <input class="form-control" type="number" name="latitude" id="latitude" step="0.00000001" value="{{ old('latitude', $beneficiario->latitud_beneficiario) }}" readonly required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 my-2">
                        <label for="longitude" class="form-label">Longitud</label>
                        <input class="form-control" type="number" name="longitude" id="longitude" step="0.00000001" value="{{ old('longitude', $beneficiario->longitud_beneficiario) }}" required>
                    </div>
                    <div class="col-12 col-md-4 my-2 align-self-end">
                        <button type="button"class="btn btn-primary" onclick="getLocation()">Obtener ubicación</button>
                    </div>
                    <div id="map" class="mb-3"></div>
                    <div class="col-12 col-md-6">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Escribe nombre de la calle" value="{{ old('direccion', $beneficiario->direccion_beneficiario) }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="colonia" class="form-label">Colonia</label>
                        <select class="form-select" name="colonia" id="colonia">
                            @switch($beneficiario->colonia_beneficiario)
                                @case('Centro')
                                    <option value=0>Elije la colonia</option>
                                    <option selected value=1>Centro</option>
                                    <option value=2>Emiliano Zapata</option>
                                    <option value=3>Barrio Santa Cruz</option>
                                    <option value=4>Vista Hermosa</option>
                                    @break
    
                                @case('Emiliano Zapata')
                                    <option value=0>Elije la colonia</option>
                                    <option value=1>Centro</option>
                                    <option selected value=2>Emiliano Zapata</option>
                                    <option value=3>Barrio Santa Cruz</option>
                                    <option value=4>Vista Hermosa</option>
                                    @break
    
                                @case('Barrio Santa Cruz')
                                    <option value=0>Elije la colonia</option>
                                    <option value=1>Centro</option>
                                    <option value=2>Emiliano Zapata</option>
                                    <option selected value=3>Barrio Santa Cruz</option>
                                    <option value=4>Vista Hermosa</option>
                                    @break

                                @case('Vista Hermosa')
                                    <option value=0>Elije la colonia</option>
                                    <option value=1>Centro</option>
                                    <option value=2>Emiliano Zapata</option>
                                    <option value=3>Barrio Santa Cruz</option>
                                    <option selected value=4>Vista Hermosa</option>
                                    @break
    
                                @default
                                    <option selected value=0>Elije la colonia</option>
                                    <option value=1>Centro</option>
                                    <option value=2>Emiliano Zapata</option>
                                    <option value=3>Barrio Santa Cruz</option>
                                    <option value=4>Vista Hermosa</option>
                                    @break
                            @endswitch
                        </select>
                    </div>
                    <div class="col-12 col-sm-8 my-2">
                        <label for="userType" class="form-label">Tipo de usuario</label>
                        <select class="form-select" name="userType" id="userType">
                            @if($beneficiario->tarjeta->tipoUsuario_tarjeta == 'Jefe de familia')
                                <option selected value=1>Jefe de Familia</option>
                            @else
                                <option value=1>Jefe de Familia</option>
                            @endif
                            @if($beneficiario->tarjeta->tipoUsuario_tarjeta == 'Padre soltero')
                                <option selected value=2>Padre Soltero</option>
                            @else
                                <option value=2>Padre Soltero</option>
                            @endif
                            @if($beneficiario->tarjeta->tipoUsuario_tarjeta == 'Madre soltera')
                                <option selected value=3>Madre Soltera</option>
                            @else
                                <option value=3>Madre Soltera</option>
                            @endif
                            @if($beneficiario->tarjeta->tipoUsuario_tarjeta == 'Adulto mayor')
                                <option selected value=4>Adulto Mayor</option>
                            @else
                                <option value=4>Adulto Mayor</option>
                            @endif
                            @if($beneficiario->tarjeta->tipoUsuario_tarjeta == 'Voluntario')
                                <option selected value=5>Voluntario</option>
                            @else
                                <option value=5>Voluntario</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-12 col-sm-4 my-2 align-self-end">
                        <input type="submit" class="btn btn-success" value="Actualizar registro">
                    </div>
                </div>
            </form>
        </div>

        <script>
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert("La geolocalización no está soportada en tu navegador.");
                }
            }

            function showPosition(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude;

                // Mostrar la ubicación en un mapa
                const mapOptions = {
                    center: { lat: latitude, lng: longitude },
                    zoom: 15
                };

                const map = new google.maps.Map(document.getElementById('map'), mapOptions);

                const marker = new google.maps.Marker({
                    position: { lat: latitude, lng: longitude },
                    map: map,
                    title: 'Ubicación del beneficiario'
                });
            }
        </script>
        <!-- Agrega tu API key de Google Maps aquí -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5LHnuQQ9pjhyDh7h1fiFo5Cyi_fSaw5c&callback=initMap" async defer></script>
</x-app-layout>