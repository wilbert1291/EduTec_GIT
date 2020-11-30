@extends('layouts.teacher')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Alumnos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_alumnos" id="nuevo_alumno">Agregar nuevo alumno</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="tabla_alumnos">
        <thead class="thead-dark">
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Municipio
                </th>
                <th>
                    Localidad
                </th>
                <th>
                    Tipo usuario
                </th>
                <th>
                    Sexo
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Apellido Paterno
                </th>
                <th>
                    Apellido Materno
                </th>
                <th>
                    Correo
                </th>
                <th>
                    Telefono
                </th>
                <th>
                    Curp
                </th>
                <th>
                    Calle
                </th>
                <th>
                    Colonia
                </th>
                <th>
                    Codigo postal
                </th>
                <th>
                    Grupo
                </th>
                <th>
                    Semestre
                </th>
                <th>
                    ¿Dar acceso?
                </th>
                <th>
                    Usuario
                </th>
                <th>
                    Contraseña
                </th>
                <th>
                    Pregunta secreta
                </th>
                <th>
                    Respuesta
                </th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal Alumnos -->
<div class="modal fade" id="modal_alumnos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal">Alumnos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="text" id="id_user" hidden>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ap">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="ap" placeholder="Apellido paterno">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="am">Apellido Materno:</label>
                            <input type="text" class="form-control" id="am" placeholder="Apellido Materno">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="curp">Curp:</label>
                            <input type="text" class="form-control" id="curp" placeholder="Curp">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="curp">Sexo:</label>
                            <select id="sexo" class="form-control">
                                <option value="0">-Selecciona-</option>
                                @foreach ($sexos as $item)
                                    <option value="{{ $item->int_IdSexo}}">{{ $item->vch_Sexo}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <select id="estado" class="form-control" onchange="cargar_municipios(0)">
                                <option value="0">-Selecciona-</option>
                                @foreach ($estados as $item)
                                    <option value="{{ $item->chrClvEdo }}">{{ $item->vchNomEstado}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="municipio">Municipio:</label>
                            <select id="municipio" class="form-control" onchange="cargar_localidades(this.value, 0)">
                                <option value="0">-Selecciona-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="localidad">Localidad:</label>
                            <select id="localidad" class="form-control">
                                <option value="0">-Selecciona-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="calle">Calle:</label>
                            <input type="text" class="form-control" id="calle" placeholder="Calle">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="colonia">Colonia:</label>
                            <input type="text" class="form-control" id="colonia" placeholder="Colonia">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="codigo_postal">Codigo Postal:</label>
                            <input type="text" class="form-control" id="codigo_postal" placeholder="Codigo postal">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="email" class="form-control" id="correo" placeholder="Correo">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pregunta_secreta">Pregunta secreta:</label>
                            <input type="text" class="form-control" id="pregunta_secreta" placeholder="Pregunta secreta">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="respuesta">Respuesta:</label>
                            <input type="text" class="form-control" id="respuesta" placeholder="Respuesta">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="profesor">Profesor:</label>
                            <select id="profesor" class="form-control">
                                <option value="0">-Selecciona-</option>
                                $@foreach ($profesores as $item)
                            <option value="{{ $item->int_IdProfesor }}">{{ $item->name}} {{ $item->vch_ApellidoPaterno}} {{ $item->vch_ApellidoMaterno}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigo_postal">Grupo:</label>
                            <input type="text" class="form-control" id="grupo" placeholder="Grupo">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigo_postal">Semestre:</label>
                            <input type="text" class="form-control" id="semestre" placeholder="Semestre">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="acceso">¿Dar acceso?</label>
                            <select class="form-control" id="acceso">
                                <option value="0">-Selecciona-</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="btn_editar">Guardar</button>
                <button type="button" class="btn btn-success" id="btn_guardar">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endsection
