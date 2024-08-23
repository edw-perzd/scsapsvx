@section('title', 'Crear usuario')

<x-app-layout>
    <div class="container p-3 p-sm-5 my-5 text-center w-75 rounded bg-white">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <h1 class="mb-5">Crear usuario</h1>
            <form action="{{route('admin.users.store')}}" method="POST">

                @csrf

                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Escribe nombre" autocomplete="off" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Escribe correo electrónico" autocomplete="off" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="password" class="form-label">Contraseña</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Crea una contraseña" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirma la contraseña" required>
                    </div>
                    <div class="col-12 col-sm-12 my-2 align-self-start">
                        <input type="submit" class="btn btn-success" value="Guardar registro">
                    </div>
                </div>
            </form>
        </div>
</x-app-layout>