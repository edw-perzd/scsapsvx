    <!-- NAVBAR -->
    <div class="navbar-dark bg-primary">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary container">
            <div class="container-fluid">
                @if(Auth::user()->roles['0']->id == 1)
                    <a class="navbar-brand" href="{{ route('admin.users.index') }}">
                        <img src="{{ asset('logo_contorno.png') }}" alt="Logo" width="30"
                            height="24" class="d-inline-block align-text-top mx-1">
                            SGSAPSVX
                    </a>
                @elseif(Auth::user()->roles['0']->id == 2)
                    <a class="navbar-brand" href="{{ route('cobros.index') }}">
                        <img src="{{ asset('logo_contorno.png') }}" alt="Logo" width="30"
                            height="24" class="d-inline-block align-text-top mx-1">
                            SGSAPSVX
                    </a>
                @else
                    <a class="navbar-brand" href="{{ route('beneficiarios.index') }}">
                        <img src="{{ asset('logo_contorno.png') }}" alt="Logo" width="30"
                            height="24" class="d-inline-block align-text-top mx-1">
                            SGSAPSVX
                    </a>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav nav-underline m-auto">
                        @can('admin.users.index')
                        <li class="nav-item m-auto mx-md-2">
                            <a class="nav-link {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }} text-light icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="{{route('admin.users.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                Usuarios del sistema
                            </a>
                        </li>
                        @endcan
                        @can('cobros.index')
                        <li class="nav-item m-auto mx-md-2">
                          <a class="nav-link {{ Route::currentRouteName() == 'cobros.index' ? 'active' : '' }} text-light icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="{{route('cobros.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                                <use xlink:href="#clipboard"></use>
                            </svg>
                            Cobros
                          </a>
                        </li>
                        @endcan
                        @can('beneficiarios.index')
                        <li class="nav-item m-auto mx-md-2">
                            <a class="nav-link {{ Route::currentRouteName() == 'beneficiarios.index' ? 'active' : '' }} text-light icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="{{route('beneficiarios.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                    <use xlink:href="#clipboard"></use>
                                </svg>
                                Beneficiarios
                            </a>
                        </li>
                        @endcan
                        @can('reportes.index')
                        <li class="nav-item m-auto mx-md-2">
                            <a class="nav-link {{ Route::currentRouteName() == 'reportes.index' ? 'active' : '' }} text-light icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="{{route('reportes.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                                <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                            </svg>
                                Reportes
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item dropdown m-auto d-md-none">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><form class="" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Cerrar Sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <li class="nav nav-item dropdown d-md-block d-none">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><form class="" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </div>
            </div>
        </nav>
    </div>
