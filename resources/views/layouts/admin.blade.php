<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    @if (Request::path() == 'admin/inicio')
        <title>Admin: Inicio</title>
    @endif

    @if (Request::path() == 'admin/categorias')
    <title>Admin: Categorias</title>
    @endif

    @if (Request::path() == 'admin/historial_pagos')
    <title>Admin: Historial de pagos</title>
    @endif

    @if (Request::path() == 'admin/usuarios')
    <title>Admin: Usuarios</title>
    @endif

    @if (Request::path() == 'admin/empleados')
    <title>Admin: Empleados</title>
    @endif

    @if (Request::path() == 'admin/instituciones')
    <title>Admin: Instituciones</title>
    @endif

    @if (Request::path() == 'admin/cursos')
    <title>Admin: Cursos</title>
    @endif

    @if (Request::path() == 'admin/metodos_pago')
    <title>Admin: Metodos de pago</title>
    @endif

    @if (Request::path() == 'admin/sexos')
    <title>Admin: Sexos</title>
    @endif
    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/dashboard.css') }}">


</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ asset('admin/inicio') }}">EduTec</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @if (Request::path()== "admin/inicio") active @endif" href="{{ asset('admin/inicio') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Inicio <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::path()== "admin/categorias") active @endif" href="{{ asset('admin/categorias') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                Categorias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::path()== "admin/historial_pagos") active @endif" href="{{ asset('admin/historial_pagos') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                Historial de pagos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::path()== "admin/usuarios") active @endif" href="{{ asset('admin/usuarios') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::path()== "admin/empleados") active @endif" href="{{ asset('admin/empleados') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-users">
                                    <path
                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                                    </path>
                                </svg>
                                Empleados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::path()== "admin/instituciones") active @endif" href="{{ asset('admin/instituciones') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-bar-chart-2">
                                    <line x1="18" y1="20" x2="18" y2="10"></line>
                                    <line x1="12" y1="20" x2="12" y2="4"></line>
                                    <line x1="6" y1="20" x2="6" y2="14"></line>
                                </svg>
                                Instituciones
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::path()== "admin/cursos") active @endif" href="{{ asset('admin/cursos') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-layers">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                Cursos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::path()== "admin/metodos_pago") active @endif" href="{{ asset('admin/metodos_pago') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-layers">
                                    <path
                                        d="M2 17h2v.5H3v1h1v.5H2v1h3v-4H2v1zm1-9h1V4H2v1h1v3zm-1 3h1.8L2 13.1v.9h3v-1H3.2L5 10.9V10H2v1zm5-6v2h14V5H7zm0 14h14v-2H7v2zm0-6h14v-2H7v2z">
                                    </path>
                                </svg>
                                Metodos de pago
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::path()== "admin/sexos") active @endif" href="{{ asset('admin/sexos') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-layers">
                                    <path d="M10 18h5v-6h-5v6zm-6 0h5V5H4v13zm12 0h5v-6h-5v6zM10 5v6h11V5H10z"></path>
                                </svg>
                                Sexos
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="chartjs-size-monitor"
                    style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                </div>
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ asset('js/jquery/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>

    @if (Request::path() == "admin/categorias")
        <script src="{{ asset('js/admin/categorias.js')}}"></script>
    @endif

    @if (Request::path() == "admin/historial_pagos")
        <script src="{{ asset('js/admin/historial_pagos.js')}}"></script>
    @endif

    @if (Request::path() == "admin/usuarios")
        <script src="{{ asset('js/admin/usuarios.js')}}"></script>
    @endif

    @if (Request::path() == "admin/empleados")
        <script src="{{ asset('js/admin/empleados.js')}}"></script>
    @endif

    @if (Request::path() == "admin/instituciones")
        <script src="{{ asset('js/admin/instituciones.js')}}"></script>
    @endif

    @if (Request::path() == "admin/cursos")
        <script src="{{ asset('js/admin/cursos.js')}}"></script>
    @endif

    @if (Request::path() == "admin/metodos_pago")
        <script src="{{ asset('js/admin/metodos_pago.js')}}"></script>
    @endif

    @if (Request::path() == "admin/sexos")
        <script src="{{ asset('js/admin/sexos.js')}}"></script>
    @endif

    <script src="{{ asset('js/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/font-awesome/icons.js')}}"></script>

</body>

</html>
