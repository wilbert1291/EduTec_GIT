<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed bg-dark">
            <a class="navbar-brand" href="{{ asset('inicio') }}">EDUTEC</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-md-6">
                    <hr>
                    <h5>Iniciar sesión</h5>
                    <hr>
                </div>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">{{ __('Correo:') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">{{ __('Contraseña:') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Recuérdame') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                        @endif
                    </div>
                </div>

                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Iniciar sesión') }}
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </main>

</body>
<script src="{{ asset('js/jquery/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/popper/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>

</html>
