<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>How to Create Roles and Permissions in Laravel 11 - Techsolutionstuff</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
      <nav class="navbar navbar-blue bg-blue">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon"></span>
          </button>
          
            <!-- Authentication Links -->
            @guest
            <a class="btn btn-primary mb-2" href="{{ route('users.index') }}">Administrar Users</a>
            <a class="btn btn-primary mb-2" href="{{ route('cliente.index') }}">Administrar cliente</a>
            <a class="btn btn-primary mb-2" href="{{ route('persona.index') }}">Administrar persona</a>
            <a class="btn btn-primary mb-2" href="{{ route('proveedor.index') }}">Administrar proveedor</a>
            <a class="btn btn-primary mb-2" href="{{ route('despachador.index') }}">Administrar despachadores</a>
            <a class="btn btn-primary mb-2" href="{{ route('solicitante.index') }}">Administrar solicitante</a>
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            
                {{-- <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('persona.show',  Auth::user()->persona_id ) }}">Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li> --}}
            @endguest
        
        </div>
      </nav>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-body">
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('persona.show',  Auth::user()->persona_id ) }}">Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <ul class="nav flex-column">
                    <li><a class="btn btn-primary mb-2" href="{{ route('users.index') }}">Administrar Users</a></li>
                    <li><a class="btn btn-success mb-2" href="{{ route('roles.index') }}">Administrar Role</a></li>
                    <li><a class="btn btn-warning mb-2" href="{{ route('products.index') }}">Administrar Product</a></li>
                    <li><a class="btn btn-info mb-2" href="{{ route('persona.index') }}">Administrar Persona</a></li>
                    <li><a class="btn btn-danger mb-2" href="{{ route('proveedor.index') }}">Administrar Proveedor</a></li>
                    <li><a class="btn btn-secondary mb-2" href="{{ route('cliente.index') }}">Administrar Cliente</a></li>
                    <li><a class="btn btn-dark mb-2" href="{{ route('empleado.index') }}">Administrar Empleados</a></li>
                    <li><a class="btn btn-dark mb-2" href="{{ route('distribuidora.index') }}">Administrar distribuidora</a></li>
                </ul>
                

                    {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <li><a class="nav-link" href="{{ route('persona.index') }}" id="contact-tab" data-toggle="tab" role="tab" aria-controls="contact" aria-selected="true">administrar Persona</a></li>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
                      </div> --}}
                @endguest
            </ul>
        </div>
      </div>
    <div id="app">
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>
</html>