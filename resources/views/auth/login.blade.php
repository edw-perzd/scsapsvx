<x-guest-layout>
<div class="container w-75 bg-white mt-5 rounded shadow">
    <div class="row">
        <div class="col bg-white p-5 rounded shadow">
            <div class="text-end">
            </div>
            <h2 class="fw-bold text-center py-5">Bienvenido</h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electronico</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo electrónico" value="{{ old('email') }}">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
                <div class="mb-5">
                </div>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>