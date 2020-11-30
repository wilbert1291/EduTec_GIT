<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <title>Registrarse</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed bg-dark">
            <a class="navbar-brand" href="{{ asset('inicio') }}">EDUTEC</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('inicio') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('conocenos') }}">Conocenos</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <a a class="btn btn-info" href="{{ asset('login')}}">Iniciar sesión</a>
                    <a a class="btn btn-light" href="{{ asset('register')}}">Registrarse</a>
                </form>
            </div>
        </nav>
    </header>
    <main role="main">
        <div class="container">
            <form action="{{ route('register')}}" method="post">
                @csrf
                <div class="modal-body">
                
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Datos de acceso</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correo">{{ __('Correo:') }}</label>
                                <input type="email" id="email" name="email" placeholder="Correo de contacto" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">{{ __('Contraseña:') }}</label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Datos de la institución</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">{{ __('Nombre de la institución:')}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  placeholder="Nombre de la institución">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="turno">{{ __('Turno:')}}</label>
                                <select name="turno" id="turno" class="form-control">
                                    <option value="0" selected>-Selecciona-</option>
                                    @foreach ($turnos as $turno)
                                <option value="{{$turno->int_IdTurno}}">{{$turno->vch_Turno}}</option>   
                                    @endforeach
                                        
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="turno">{{ __('Nivel escolar:')}}</label>
                                <select name="nivel_escolar" id="nivel_escolar" class="form-control">
                                    <option value="0" selected>-Selecciona-</option>
                                    @foreach ($niveles_escolares as $nivel_escolar)
                                        <option value="{{$nivel_escolar->int_IdNivelEscolar}}">{{$nivel_escolar->vch_NombreNivelEscolar}}</option>   
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                    <select id="estado" name="estado" class="form-control" onchange="cargar_municipios(0)">
                                        <option value="0">-Selecciona-</option>
                                        @foreach ($estados as $item)
                                            <option value="{{ $item->chrClvEdo }}">{{ $item->vchNomEstado }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="municipio">Municipio:</label>
                                <select id="municipio" name="municipio" class="form-control" onchange="cargar_localidades(this.value, 0)">
                                    <option value="0">-Selecciona-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="localidad">{{ __('Localidad:')}}</label>
                                <select id="localidad" name="localidad" class="form-control">
                                    <option value="0" selected>-Selecciona-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="calle">{{ __('Calle:')}}</label>
                                <input type="text" id="calle" name="calle" placeholder="Calle" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="colonia">{{ __('Colonia:')}}</label>
                                <input type="text" id="colonia" name="colonia" placeholder="Colonia" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="codigo_postal">{{ __('Codigo postal:')}}</label>
                                <input type="text" id="CP" name="CP" placeholder="Codigo postal" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clave_institucional">{{ __('Clave institucional:')}}</label>
                                <input type="text" class="form-control" id="clave_institucional" name="clave_institucional" placeholder="Clave institucional">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="clave_institucional">{{ __('Telefono institucional:')}}</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono institucional">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="sumbit" class="btn btn-primary" id="btn_registrar">Registrarse</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </main>

</body>
<script src="{{ asset('js/jquery/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/popper/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/visitor/registro_login.js') }}"></script>
<script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>
</html>
