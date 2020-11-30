@extends('layouts.teacher')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Calificaciones</h1>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="tabla_calificaciones">
        <thead class="thead-dark">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Curso
                </th>
                <th>
                    Alumno
                </th>
                <th>
                    Calificacion
                </th>
                <th>
                    Aciertos
                </th>
                <th>
                    Errores
                </th>
            </tr>
        </thead>
    </table>
</div>
@endsection