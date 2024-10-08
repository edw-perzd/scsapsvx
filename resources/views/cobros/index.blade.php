@section('title', 'Cobros del servicio')
<x-app-layout>
        <!-- CUERPO DE COBROS -->
        <div class="container-md py-4">
            <h1 class="display-6 text-center">Cobro del servicio</h1>
            <form class="row justify-content-center mt-4" action="{{route('cobros.index')}}" method="GET">
                <div class="d-none d-sm-block col-sm-1">
                    <label for="filtro">Filtrar por</label>
                </div>
                <div class="col-12 col-sm-4">
                    <select class="form-select" name="filtro" id="filtro" aria-label="Select Filter Users">
                        <option value="1">Todos</option>
                        <option value="2" {{ request('filtro') == '2' ? 'selected': '' }}>Con adeudos (Más a menos)</option>
                        <option value="3" {{ request('filtro') == '3' ? 'selected': '' }}>Con adeudos (Menos a más)</option>
                        <option value="4" {{ request('filtro') == '4' ? 'selected': '' }}>Sin adeudos</option>
                    </select>
                </div>
                <div class="col-12 col-sm-4 my-2 my-sm-0">
                    <input class="form-control" type="text" name="searchUser" id="searchUser" placeholder="Buscar por: Nombre/Apellido/Tarjeta/Toma" value="{{ request('searchUser') }}">
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
                            <th>No. toma</th>
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
                            <td>{{$beneficiario->tarjeta->numeroToma_tarjeta}}</td>
                            <td>{{$beneficiario->nombre_beneficiario}} {{$beneficiario->aPaterno_beneficiario}} {{$beneficiario->aMaterno_beneficiario}} 
                                @if($beneficiario->isTitular_beneficiario)
                                <svg style="color: blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21 21 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21 21 0 0 0 14 7.655V1.222z"/>
                                </svg>
                                @endif
                            </td>
                            <td>{{$beneficiario->direccion_beneficiario}}, {{$beneficiario->colonia_beneficiario}}</td>
                            <td>{{$beneficiario->tarjeta->tipoUsuario_tarjeta}}</td>
                            <td>${{$beneficiario->tarjeta->monto_tarjeta}}</td>
                            @if($beneficiario->tarjeta->mesesPendientes_tarjeta == 0 || $beneficiario->tarjeta->mesesPendientes_tarjeta > 1)
                                <td>{{$beneficiario->tarjeta->mesesPendientes_tarjeta}} meses</td>
                            @elseif($beneficiario->tarjeta->mesesPendientes_tarjeta < 0)
                                <td>0 meses</td>
                            @else
                                <td>{{$beneficiario->tarjeta->mesesPendientes_tarjeta}} mes</td>
                            @endif
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="{{route('cobros.show', $beneficiario->id_beneficiario)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                                    </svg>
                                    Pagar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $beneficiarios->links() }}
            <div class="row justify-content-center text-center">
                <h5 class="col-12">Total de tomas: {{ $totalTomas }}</h5>
            </div>
        </div>
</x-app-layout>