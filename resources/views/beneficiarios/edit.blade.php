@section('title', 'Editar beneficiario')

<x-app-layout>
    <div class="container p-3 p-sm-5 my-5 text-center w-75 rounded bg-white">
            <h1 class="mb-5">Editar usuario</h1>
            <form action="{{route('beneficiarios.update', $beneficiario->id_beneficiario)}}" method="POST">

                @csrf

                @method('PUT')
                
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <label for="noTarjeta" class="form-label">No. de tarjeta</label>
                        <input class="form-control" type="text" name="noTarjeta" id="noTarjeta" placeholder="Escribe número de tarjeta" value="{{$beneficiario->tarjeta->numero_tarjeta}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Escribe nombre" value="{{$beneficiario->nombre_beneficiario}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="aPaterno" class="form-label">Apellido paterno</label>
                        <input class="form-control" type="text" name="aPaterno" id="aPaterno" placeholder="Escribe apellido paterno" value="{{$beneficiario->aPaterno_beneficiario}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="aMaterno" class="form-label">Apellido materno</label>
                        <input class="form-control" type="text" name="aMaterno" id="aMaterno" placeholder="Escribe apellido materno" value="{{$beneficiario->aMaterno_beneficiario}}">
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 my-2">
                        <label for="latitude" class="form-label">Latitud</label>
                        <input class="form-control" type="number" name="latitude" id="latitude" value="{{$beneficiario->latitud_beneficiario}}">
                        <!-- <input type="text" class="form-control" id="latitude" disabled> -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 my-2">
                        <label for="longitude" class="form-label">Longitud</label>
                        <input class="form-control" type="number" name="longitude" id="longitude" value="{{$beneficiario->longitud_beneficiario}}">
                        <!-- <input type="text" class="form-control" id="longitude" disabled> -->
                    </div>
                    <div class="col-12 col-md-4 my-2 align-self-end">
                        <button type="button"class="btn btn-primary">Obtener ubicación</button>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Escribe nombre de la calle" value="{{$beneficiario->direccion_beneficiario}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="colonia" class="form-label">Colonia</label>
                        <input class="form-control" type="text" name="colonia" id="colonia" placeholder="Escribe nombre de la colonia" value="{{$beneficiario->colonia_beneficiario}}">
                    </div>
                    <div class="col-12 col-sm-8 my-2">
                        <label for="userType" class="form-label">Tipo de usuario</label>
                        <select class="form-select" name="userType" id="userType">
                          <option selected value="1">Jefe de Familia</option>
                          <option value="2">Padre Soltero</option>
                          <option value="3">Madre Soltera</option>
                          <option value="4">Adulto Mayor</option>
                          <option value="5">Voluntario</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-4 my-2 align-self-end">
                        <!-- <button type="submit" class="btn btn-success">Guardar registro</button> -->
                        <input type="submit" class="btn btn-success" value="Actualizar registro">
                    </div>
                </div>
            </form>
        </div>
</x-app-layout>