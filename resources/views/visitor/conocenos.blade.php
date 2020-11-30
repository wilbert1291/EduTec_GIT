<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <title>Conocenos</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="{{ asset('inicio') }}">EDUTEC</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('inicio') }}">Inicio</a>
                    </li>
                    <li class="nav-item active">
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
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for ($i = 0; $i < $noticias->count(); $i++)
                    @if ($i == 0)
                        <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
                    @else
                        <li data-target="#myCarousel" data-slide-to="{{$i}}" class=""></li>
                    @endif
                @endfor
            </ol>
            <div class="carousel-inner">
                {{$act = 0}}
                @foreach ($noticias as $noticia)                
                    @if ($act == 0)
                        <div class="carousel-item active">
                    @else
                        <div class="carousel-item">
                    @endif
                        <svg class="bd-placeholder-img" width="100%" height="350px" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#235390"></rect>
                        </svg>
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>{{$noticia->vch_Titulo}}</h1>
                                <p>
                                   {{$noticia->vch_Contenido}}
                                </p>
                            </div>
                        </div>
                    </div>
                    {{$act = $act + 1}}
                @endforeach
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </div>
        <div class="container marketing">
            <hr>
            <h1>Equipo de trabajo</h1>
            <h2><span class="text-muted">Nuestra organización esta conformada por {{$empleados->count()}} integrantes.</span></h2>
            <hr>
            <div class="row mb-2">
                @foreach ($empleados as $empleado)               
                <div class="col-md-6">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success">Carta de identificación</strong>
                        <h5 class="mb-0">{{$empleado->name}} {{$empleado->vch_ApellidoPaterno}} {{$empleado->vch_ApellidoMaterno}}</h5>
                        <p class="mb-auto">{{$empleado->email}}</p>
                        <p class="mb-auto">{{$empleado->vch_descripcion}}</p>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                           <img src="{{asset('assets/images/trabajadores/'.$empleado->vch_fotografia)}}" class="bd-placeholder-img" width="175" height="210" alt="">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <footer class="container">
            <p class="float-right"><a href="#" id="top">Regresar arriba</a></p>
            <p>© 2020-2021 EDUTEC, Inc. · <a href="#">Policitas de privacidad</a> y <a href="#">Terminos de uso</a></p>
        </footer>
    </main>
</body>
<script src="{{asset('js/jquery/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/popper/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('js/visitor/registro_login.js')}}"></script>
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

</html>
