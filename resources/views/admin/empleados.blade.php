@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Empleados</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_empleado"
                    id="nuevo_empleado">Agregar nuevo empleado</button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="tabla_empleados">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Localidad</th>
                    <th>Acceso</th>
                    <th>Sexo</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Curp</th>
                    <th>Calle</th>
                    <th>Colonia</th>
                    <th>Codigo postal</th>
                    <th>Contraseña</th>
                    <th>Pregunta secreta</th>
                    <th>Respuesta</th>
                    <th>Fotografia</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- Modal de empleados -->
    <div class="modal fade" id="modal_empleado" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_empleado">Empleados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" id="formulario" action="{{ route('save.empleado.admin')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="text" id="id_user" name="id_user" hidden>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ap">Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="ap" name="ap"
                                        placeholder="Apellido paterno">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="am">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="am" name="am" placeholder="Apellido Materno">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono">Telefono:</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        placeholder="Telefono">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="curp">Curp:</label>
                                    <input type="text" class="form-control" id="curp" name="curp" placeholder="Curp">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="curp">Sexo:</label>
                                    <select id="sexo" name="sexo" class="form-control">
                                        <option value="0">-Selecciona-</option>
                                        @foreach ($sexos as $item)
                                            <option value="{{ $item->int_IdSexo }}">{{ $item->vch_Sexo }}</option>
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
                                    <label for="localidad">Localidad:</label>
                                    <select id="localidad" name="localidad" class="form-control">
                                        <option value="0">-Selecciona-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="calle">Calle:</label>
                                    <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="colonia">Colonia:</label>
                                    <input type="text" class="form-control" id="colonia" name="colonia"
                                        placeholder="Colonia">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo_postal">Codigo Postal:</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"
                                        placeholder="Codigo postal">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="acceso">¿Dar acceso?</label>
                                    <select class="form-control" name="acceso" id="acceso">
                                        <option value="0">-Selecciona-</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="acceso">Breve descripcion del empleado:</label>
                                    <input type="text" id="descripcion" name="descripcion" placeholder="Breve descripción"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="correo">Correo:</label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pregunta_secreta">Pregunta secreta:</label>
                                    <input type="text" class="form-control" id="pregunta_secreta" name="pregunta_secreta"
                                        placeholder="Pregunta secreta">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="respuesta">Respuesta:</label>
                                    <input type="text" class="form-control" id="respuesta" name="respuesta"
                                        placeholder="Respuesta">
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="my-input">Imagen:</label>
                                    <input id="file" name="file" class="form-control" type="file" accept="image/x-png,image/gif,image/jpeg"
                                        onchange="previewFile(this)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img id="previewImg" alt="imagen perfil" style="max-width: 100%; margin-top:20px;">
                            </div>
                        </div>-->
                    </div>
                    <div class="row modal-footer">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-warning" id="btn_editar">Guardar</button>
                            <button type="submit" class="btn btn-success" id="btn_guardar">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
