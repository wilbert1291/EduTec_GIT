@extends('layouts.teacher')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Inicio - Información relevante</h1>
</div>

<hr>
<div class="row">
    <div class="col-md-3">
        <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                <rect width="100%" height="100%" fill="#17a2b8"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $alumnos->count()}}</text>
            </svg>
            <div class="card-body">
                <center><p class="card-text">Cantidad de alumnos asignados.</p></center>
            </div>
        </div>
    </div>
</div>
@endsection