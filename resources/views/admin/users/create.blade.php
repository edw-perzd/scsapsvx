@section('title', 'Crear usuario')

<x-app-layout>
    <div class="container p-3 p-sm-5 my-5 text-center w-75 rounded bg-white">
            <h1 class="mb-5">Crear usuario</h1>
            <form action="{{route('admin.users.store')}}" method="POST">

                @csrf

                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Escribe nombre" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Escribe correo electrónico" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="password" class="form-label">Contraseña</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Crea una contraseña" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="passwordConfirm" class="form-label">Contraseña</label>
                        <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirma la contraseña" required>
                    </div>
                    <div class="col-12 col-sm-4 my-2 align-self-end">
                        <input type="submit" class="btn btn-success" value="Guardar registro">
                    </div>
                </div>
            </form>
        </div>
</x-app-layout>