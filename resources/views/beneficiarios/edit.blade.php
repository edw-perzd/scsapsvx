@extends('layouts.app')

@section('content')

<!-- NAVBAR -->
<div class="navbar-dark bg-primary">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary container">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="https://getbootstrap.com//docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30"
                        height="24" class="d-inline-block align-text-top mx-1">
                    SGSAPSVX
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav nav-underline m-auto">
                        <li class="nav-item m-auto mx-md-2">
                            <a class="nav-link text-light icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="index.html">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                <use xlink:href="#clipboard"></use>
                              </svg>
                              Inicio
                            </a>
                        </li>
                        <li class="nav-item m-auto mx-md-2">
                          <a class="nav-link text-light icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="{{route('cobros.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                                <use xlink:href="#clipboard"></use>
                            </svg>
                            Cobros
                          </a>
                        </li>
                        <li class="nav-item m-auto mx-md-2">
                            <a class="nav-link active text-light icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="{{route('beneficiarios.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item dropdown m-auto d-md-none">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                usuario123
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Configuración</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                    <li class="nav nav-item dropdown d-md-block d-none">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            usuario1234
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Configuración</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </nav>
    </div>

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
                    <!-- <div class="col-12 d-none d-sm-block my-2">
                        <label for="formINE" class="form-label">Fotografía de INE</label>
                        <input class="form-control" type="file" id="formINE">
                    </div>
                    <div class="col-12 d-sm-none my-2">
                        <label for="formINE" class="form-label">Fotografía de INE</label>
                        <input class="form-control form-control-sm" type="file" id="formINE">
                    </div> -->
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

@endsection