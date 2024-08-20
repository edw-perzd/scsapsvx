@section('title', 'Cobros del servicio')
<x-app-layout>
        <!-- CUERPO DE COBROS -->
        <div class="container-md py-4">
            <h1 class="display-6 text-center">Cobro del servicio</h1>
            <form class="row justify-content-center mt-4" action="{{route('cobros.index')}}" method="GET">
                <div class="d-none d-sm-block col-sm-1">
                    <label for="filtro">Filtrar por</label>
                </div>
                <div class="col-8 col-sm-5">
                    <select class="form-select" name="filtro" id="filtro" aria-label="Select Filter Users">
                        <option value="1" selected>Todos</option>
                        <option value="2">Con adeudos</option>
                        <option value="3">Sin adeudos</option>
                    </select>
                </div>
                <div class="col-4 col-sm-2 d-grid">
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                </div>
            </form>
            <div class="table-responsive my-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. tarjeta</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Tipo de usuario</th>
                            <th>Monto</th>
                            <th>Adeudos</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td>{{$beneficiario->tarjeta->numero_tarjeta}}</td>
                            <td>{{$beneficiario->nombre_beneficiario}} {{$beneficiario->aPaterno_beneficiario}} {{$beneficiario->aMaterno_beneficiario}}</td>
                            <td>{{$beneficiario->direccion_beneficiario}}, {{$beneficiario->colonia_beneficiario}}</td>
                            <td>{{$beneficiario->tarjeta->tipoUsuario_tarjeta}}</td>
                            <td>${{$beneficiario->tarjeta->monto_tarjeta}}</td>
                            @if($beneficiario->tarjeta->mesesPendientes_tarjeta == 0 || $beneficiario->tarjeta->mesesPendientes_tarjeta > 1)
                                <td>{{$beneficiario->tarjeta->mesesPendientes_tarjeta}} meses</td>
                            @else
                                <td>{{$beneficiario->tarjeta->mesesPendientes_tarjeta}} mes</td>
                            @endif
                            <td>
                            @if($beneficiario->tarjeta->mesesPendientes_tarjeta > 0)
                                <a class="btn btn-outline-success btn-sm" href="{{route('cobros.show', $beneficiario->id_beneficiario)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                                    </svg>
                                    Pagar
                                </a>
                            @else
                                <a class="btn btn-outline-primary btn-sm" href="{{route('cobros.show', $beneficiario->id_beneficiario)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                                    </svg>
                                    Imprimir tarjeta
                                </a>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>