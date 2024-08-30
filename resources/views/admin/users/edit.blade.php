@section('title', 'Editar usuario')

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
            <form action="{{route('admin.users.update', $user)}}" method="POST">

                @csrf

                @method('PUT')
                
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Escribe nombre" value="{{old('name', $user->name)}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Escribe correo electrónico" value="{{old('email', $user->email)}}">
                    </div>
                    <div class="col-12 col-sm-8 my-2">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" name="rol" id="rol">
                          <option value=0 selected>Selecciona un rol</option>
                          @foreach($roles as $role)
                            @if($user->roles->isEmpty())
                                <option value={{$role->id}}>{{$role->name}}</option>
                            @else
                                @if($role->id == $user->roles['0']->id)
                                    <option selected value={{$role->id}}>{{$role->name}}</option>
                                @else
                                    <option value={{$role->id}}>{{$role->name}}</option>
                                @endif
                            @endif
                          @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="password" class="form-label">Cambiar contraseña</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Escribe la nueva contraseña">
                    </div>
                    <div class="col-12 col-sm-4 my-2 align-self-end">
                        <input type="submit" class="btn btn-success" value="Actualizar registro">
                    </div>
                </div>
            </form>
        </div>
</x-app-layout>