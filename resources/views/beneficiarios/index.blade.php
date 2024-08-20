@section('title', 'Beneficiarios')

<x-app-layout>
    <!-- CUERPO DE CLIENTES -->
    <div class="container-md py-4">
        <h1 class="display-6 text-center">Usuarios registrados en el sistema del servicio</h1>
        <!-- FORMULARIO DE BÚSQUEDA -->
        <form class="row justify-content-center mt-4" action="{{route('beneficiarios.index')}}" method="GET">
            <div class="col-8 col-sm-5">
                <input class="form-control" type="text" name="searchUser" id="searchUser" placeholder="Nombre/Tarjeta">
            </div>
            <div class="col-4 col-sm-2 d-grid">
                <button type="submit" class="btn btn-outline-primary">Buscar</button>
            </div>
        </form>
        <div class="d-grid gap-2 d-sm-flex my-4 justify-content-sm-end">
            <a class="btn btn-outline-success" href="{{route('beneficiarios.register')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                </svg>
                Registrar usuario
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No. tarjeta</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Colonia</th>
                        <th>Tipo de usuario</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td>{{$beneficiario->tarjeta->numero_tarjeta}}</td>
                            <td>{{$beneficiario->nombre_beneficiario}}</td>
                            <td>{{$beneficiario->direccion_beneficiario}}</td>
                            <td>{{$beneficiario->colonia_beneficiario}}</td>
                            <td>{{$beneficiario->tarjeta->tipoUsuario_tarjeta}}</td>
                            <td>
                                <a class="btn btn-outline-primary btn-sm" href="{{route('beneficiarios.edit', $beneficiario->id_beneficiario)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                    Editar
                                </a>
                                <!-- <a class="btn btn-outline-danger btn-sm" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eraser" viewBox="0 0 16 16">
                                        <path
                                            d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293z" />
                                    </svg>
                                    Eliminar</a> -->

                                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eraser" viewBox="0 0 16 16">
                                        <path
                                            d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293z" />
                                    </svg>
                                Eliminar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Aviso!</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Se eliminará el registro
                                    </div>
                                    <form action="{{route('beneficiarios.destroy', $beneficiario->id_beneficiario)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>