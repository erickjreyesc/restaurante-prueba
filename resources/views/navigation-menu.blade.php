<div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="navoffcanvas" aria-labelledby="navoffcanvasLabel">
        <div class="offcanvas-header bg-main">
            <a class="text-white navbar-brand me-2" href="/" target="_blank">
                {{ config('app.name') }}
            </a>
            <a href="{{ route('dashboard') }}" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Ir al Inicio">
                <i class="text-white fas fa-home me-1"></i>
            </a>
        </div>
        <div class="offcanvas-body">
            <div class="py-1 text-center d-block d-sm-block d-md-none d-lg-none d-xl-none d-xxl-none bg-indentity">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="my-2 rounded-circle" width="50" height="50"
                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->usuario }}" /> <br>
                @endif
                <span class="my-2 text-white fw-bold">{{ Auth::user()->usuario }}</span>
                <div class="my-2 d-block d-flex justify-content-evenly">
                    <div class="text-white d-inline">
                        <a href="{{ route('profile.show') }}" class="text-white">
                            <i class="fas fa-user-cog"></i> {{ __('Perfil') }}
                        </a>
                    </div>
                    <div class="d-inline">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            class="text-white">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesión') }}
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushMainMenu">
                @canany(['venta.listar', 'reporte.listar', 'producto.listar'])
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingActas">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseActas" aria-expanded="false"
                            aria-controls="flush-collapseActas">
                            <i class="fas fa-file-contract me-1"></i>Ventas
                        </button>
                    </h2>
                    <div id="flush-collapseActas" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingActas" data-bs-parent="#accordionFlushMainMenu">
                        <div class="border-0 accordion-body">
                            <ul class="list-group">
                                @can('venta.listar')
                                    <a class="no-bullets" href="{{ route('venta.listar') }}">
                                        <li class="list-group-item">
                                            <i class="fas fa-file-invoice me-1"></i>Ventas
                                        </li>
                                    </a>
                                @endcan
                                @can('reporte.listar')
                                    <a class="no-bullets" href="{{ route('reporte.listar') }}">
                                        <li class="list-group-item">
                                            <i class="fas fa-file-invoice-dollar me-1"></i>Reportes
                                        </li>
                                    </a>
                                @endcan                                
                                @can('producto.listar')
                                    <a class="no-bullets" href="{{ route('producto.listar') }}">
                                        <li class="list-group-item">
                                            <i class="fas fa-warehouse me-1"></i>Productos
                                        </li>
                                    </a>
                                @endcan
                            </ul>
                        </div>
                    </div>
                </div>
                @endcanany
                @canany(['venta.listar', 'reporte.listar'])
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingParams">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseParams" aria-expanded="false"
                            aria-controls="flush-collapseParams">
                            <i class="fas fa-clipboard-list me-1"></i>Parametros
                        </button>
                    </h2>
                    <div id="flush-collapseParams" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingParams" data-bs-parent="#accordionFlushMainMenu">
                        <div class="border-0 accordion-body">
                            <ul class="list-group">
                                @can('tipo-operacion.listar')
                                    <a class="no-bullets" href="{{ route('tipo-operacion.listar') }}">
                                        <li class="list-group-item">
                                            <i class="fas fa-exchange-alt me-1"></i>Tipo Operación
                                        </li>
                                    </a>
                                @endcan
                                @can('tipo-producto.listar')
                                    <a class="no-bullets" href="{{ route('tipo-producto.listar') }}">
                                        <li class="list-group-item">
                                            <i class="fab fa-product-hunt me-1"></i>Tipo Producto
                                        </li>
                                    </a>
                                @endcan
                            </ul>
                        </div>
                    </div>
                </div>
                @endcanany
                @canany(['usuario.listar', 'registro.listar'])
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingSecurity">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseSecurity" aria-expanded="false"
                                aria-controls="flush-collapseSecurity">
                                <i class="fas fa-shield-alt me-1"></i>Seguridad
                            </button>
                        </h2>
                        <div id="flush-collapseSecurity" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingSecurity" data-bs-parent="#accordionFlushMainMenu">
                            <div class="border-0 accordion-body">
                                <ul class="list-group">
                                    @can('usuario.listar')
                                        <a class="no-bullets" href="{{ route('usuario.listar') }}">
                                            <li class="list-group-item">
                                                <i class="fas fa-users me-1"></i>Usuarios
                                            </li>
                                        </a>
                                    @endcan
                                    @can('registro.listar')
                                        <a class="no-bullets" href="{{ route('registro.listar') }}">
                                            <li class="list-group-item">
                                                <i class="fas fa-file me-1"></i>Registros
                                            </li>
                                        </a>
                                    @endcan
                                </ul>
                            </div>
                        </div>
                    </div>
                @endcanany
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-md bg-main navbar-dark border-bottom sticky-top">
        <div class="container">
            <div>
                <!-- Logo -->
                <button class="btn btn-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#navoffcanvas" aria-controls="navoffcanvas">
                    <i class="text-white fas fa-bars"></i>
                </button>
                <a class="navbar-brand me-2" href="/" target="_blank">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="d-none d-md-block d-lg-block d-xl-block d-xxl-block">

                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav align-items-baseline">
                        <!-- Settings Dropdown -->
                        @auth
                            <x-jet-dropdown id="settingsDropdown">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <img class="rounded-circle" width="32" height="32"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->usuario }}" />
                                    @else
                                        {{ Auth::user()->usuario }}

                                        <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <h6 class="dropdown-header small text-muted">
                                        {{ Auth::user()->usuario }}
                                    </h6>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        <i class="fas fa-user-cog"></i> {{ __('Perfil') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <hr class="dropdown-divider">

                                    <!-- Authentication -->
                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesión') }}
                                    </x-jet-dropdown-link>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
