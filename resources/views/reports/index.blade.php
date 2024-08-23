@section('title', 'Generar reporte')

<x-app-layout>

    <div class="container-md py-4">
        <h1 class="display-6 text-center">Generar reportes</h1>
        @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        <div class="row align-items-center my-5">
            <div class="col-12 col-md-6">
                <h2>Por dia:</h2>
                <form action="{{ route('reportes.dia') }}" method="POST">
                    @csrf
                    <div >
                        <label for="fecha" class="form-label">Selecciona el dia:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                        <br>
                        <button type="submit" class="btn btn-primary">Generar reporte</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <h2>Por mes:</h2>
                <form action="{{ route('reportes.mes') }}" method="POST">
                    @csrf
                    <div >
                        <label for="fecha" class="form-label">Selecciona el mes:</label>
                        <input type="month" class="form-control" id="month" name="month" required>
                        <br>
                        <button type="submit" class="btn btn-primary">Generar reporte</button>
                    </div>
                </form>
            </div>
            <a href="{{ route('reportes.users') }}" class="btn btn-primary btn-large py-3 my-4">
                Generar reporte general de beneficiarios
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                  </svg>
            </a>
        </div>
    </div>

</x-app-layout>