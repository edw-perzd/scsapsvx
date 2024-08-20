@section('title', 'Editar usuario')

<x-app-layout>
    <div class="container p-3 p-sm-5 my-5 text-center w-75 rounded bg-white">
            <h1 class="mb-5">Editar usuario</h1>
            <form action="{{route('admin.users.update', $user)}}" method="POST">

                @csrf

                @method('PUT')
                
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Escribe nombre" value="{{$user->name}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Escribe correo electrónico" value="{{$user->email}}">
                    </div>
                    <div class="col-12 col-sm-8 my-2">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" name="rol" id="rol">
                          <option selected>Selecciona un rol</option>
                          @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="password" class="form-label">Cambiar contraseña</label>
                        <input class="form-control" type="text" name="password" id="password" placeholder="Escribe la nueva contraseña">
                    </div>
                    <div class="col-12 col-sm-4 my-2 align-self-end">
                        <input type="submit" class="btn btn-success" value="Actualizar registro">
                    </div>
                </div>
            </form>
        </div>
</x-app-layout>