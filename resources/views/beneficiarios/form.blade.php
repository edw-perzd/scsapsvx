@section('title', 'Nuevo beneficiario')

<x-app-layout>
    <div class="container p-3 p-sm-5 my-5 text-center w-75 rounded bg-white">
            <h1 class="mb-5">Registrar usuario</h1>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <form action="{{route('beneficiarios.create')}}" method="POST">

                @csrf
                
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <label for="noTarjeta" class="form-label">No. de tarjeta</label>
                        <input class="form-control" type="text" name="noTarjeta" id="noTarjeta" placeholder="Escribe número de tarjeta" value="{{ old('noTarjeta') }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Escribe nombre" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="aPaterno" class="form-label">Apellido paterno</label>
                        <input class="form-control" type="text" name="aPaterno" id="aPaterno" placeholder="Escribe apellido paterno" value="{{ old('aPaterno') }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="aMaterno" class="form-label">Apellido materno</label>
                        <input class="form-control" type="text" name="aMaterno" id="aMaterno" placeholder="Escribe apellido materno" value="{{ old('aMaterno') }}" required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 my-2">
                        <label for="latitude" class="form-label">Latitud</label>
                        <input class="form-control" type="number" name="latitude" id="latitude" step="0.00000001" value="{{ old('latitude') }}" readonly required>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 my-2">
                        <label for="longitude" class="form-label">Longitud</label>
                        <input class="form-control" type="number" name="longitude" id="longitude" step="0.00000001" value="{{ old('longitude') }}" readonly required>
                    </div>
                    <div class="col-12 col-md-4 my-2 align-self-end">
                        <button type="button"class="btn btn-primary" onclick="getLocation()">Obtener ubicación</button>
                    </div>
                    <div id="map" class="mb-3"></div>
                    <div class="col-12 col-md-6">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Escribe nombre de la calle" value="{{ old('direccion') }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="colonia" class="form-label">Colonia</label>
                        <input class="form-control" type="text" name="colonia" id="colonia" placeholder="Escribe nombre de la colonia" value="{{ old('colonia') }}" required>
                    </div>
                    <div class="col-12 col-sm-8 my-2">
                        <label for="userType" class="form-label">Tipo de usuario</label>
                        <select class="form-select" name="userType" id="userType">
                          <option value="" selected>Elije tu tipo de usuario...</option>
                          <option value="1">Jefe de Familia</option>
                          <option value="2">Padre Soltero</option>
                          <option value="3">Madre Soltera</option>
                          <option value="4">Adulto Mayor</option>
                          <option value="5">Voluntario</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-4 my-2 align-self-end">
                        <!-- <button type="submit" class="btn btn-success">Guardar registro</button> -->
                        <input type="submit" class="btn btn-success" value="Guardar registro">
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