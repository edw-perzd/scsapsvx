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
                          <a class="nav-link active text-light icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="{{route('cobros.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                                <use xlink:href="#clipboard"></use>
                            </svg>
                            Cobros
                          </a>
                        </li>
                        <li class="nav-item m-auto mx-md-2">
                            <a class="nav-link text-light icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="{{route('beneficiarios.index')}}">
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

    <!-- CUERPO DE TARJETA -->
    <div class="container-md py-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="cobros.html">Cobros</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tarjeta: {{ $id  }}</li>
            </ol>
        </nav>
        <div class="container mt-5">
            <h3 class="text-center">Cobros</h3>
            <div class="user-details">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nombre:</strong> Ricardo Flores</p>
                        <p><strong>Monto:</strong> $50</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p><strong>Dirección:</strong> New York City, USA</p>
                        <p><strong>Tipo de usuario:</strong> Jefe de familia</p>
                        <p><strong>No. Tarjeta:</strong> 12345678</p>
                    </div>
                </div>
            </div>
    
            <!-- <div class="col-6">
                <input class="form-control" id="name" type="text" placeholder="Ricardo Flores" aria-label="Disabled input example" disabled>
            </div> -->
            <h1 class="display-6 mt-4 text-center">Selecciona los meses a pagar</h1>
            <hr>
            <form action="">
                <div class="row mt-4">
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-ene24" autocomplete="off" disabled>
                        <label class="btn btn-primary" for="btn-check-ene24">Ene. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-feb24" autocomplete="off" disabled>
                        <label class="btn btn-primary" for="btn-check-feb24">Feb. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-mar24" autocomplete="off" disabled>
                        <label class="btn btn-primary" for="btn-check-mar24">Mar. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-abr24" autocomplete="off">
                        <label class="btn btn-outline-danger" for="btn-check-abr24">Abr. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-may24" autocomplete="off">
                        <label class="btn btn-outline-danger" for="btn-check-may24">May. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-jun24" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-check-jun24">Jun. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-jul24" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-check-jul24">Jul. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-ago24" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-check-ago24">Ago. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-sept24" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-check-sept24">Sept. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-oct24" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-check-oct24">Oct. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-nov24" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-check-nov24">Nov. 2024</label><br>
                    </div>
                    <div class="col-4 col-sm-2 col-lg-1 mb-3">
                        <input type="checkbox" class="btn-check" id="btn-check-dic24" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-check-dic24">Dic. 2024</label><br>
                    </div>
                    <div class="w-100 my-2"></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-3 my-2 d-grid">
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                              </svg>
                            Pagar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection