@section('title', 'Tarjeta')
<x-app-layout>
    <!-- CUERPO DE TARJETA -->
    <div class="container-md py-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('cobros.index')}}">Cobros</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tarjeta: {{ $beneficiario->tarjeta->numero_tarjeta}}</li>
            </ol>
        </nav>
        <div class="container mt-5">
            <h3 class="text-center">Cobros</h3>
            <div class="user-details">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>No. Tarjeta: </strong>{{ $beneficiario->tarjeta->numero_tarjeta}}</p>
                        <p><strong>Nombre: </strong>{{$beneficiario->nombre_beneficiario}} {{$beneficiario->aPaterno_beneficiario}} {{$beneficiario->aMaterno_beneficiario}}</p>
                        <p><strong>Monto:</strong> ${{$beneficiario->tarjeta->monto_tarjeta}}</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p><strong>Dirección: </strong>{{$beneficiario->direccion_beneficiario}}, {{$beneficiario->colonia_beneficiario}}</p>
                        <p><strong>Tipo de usuario: </strong>{{$beneficiario->tarjeta->tipoUsuario_tarjeta}}</p>
                        <p><strong>Proximo pago: </strong>{{ $beneficiario->tarjeta->proximoPago_tarjeta}}</p>
                    </div>
                </div>
            </div>
            @if($beneficiario->tarjeta->mesesPendientes_tarjeta > 0)
                <h1 class="display-6 mt-4 text-center">Selecciona los meses a pagar:</h1>
                <hr>
                <form action="{{route('cobros.pagar', $beneficiario)}}" method="POST">
                @csrf
                    <div class="row mt-4 justify-content-center">
                        @foreach ($fechas as $fecha)
                            <div class="col-4 col-sm-2 col-lg-1 mb-3">
                                <input type="checkbox" class="btn-check" name="meses[]" id="btn-check-{{$fecha}}" autocomplete="off">
                                <label class="btn btn-outline-danger" for="btn-check-{{$fecha}}">{{$fecha}}</label><br>
                            </div>
                        @endforeach
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
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-3 my-2 d-grid">
                        <a class="btn btn-primary" href="{{ route('cobros.imprimir', $beneficiario) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                        </svg>
                        Imprimir tarjeta
                        </a>
                    </div>
                </div>
            @else
                <h1 class="display-6 mt-4 text-center">Esta persona no tiene meses pendientes</h1>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-3 my-2 d-grid">
                        <a class="btn btn-primary" href="{{ route('cobros.imprimir', $beneficiario) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                        </svg>
                        Imprimir tarjeta
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>