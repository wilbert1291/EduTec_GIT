@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Instituciones</h1>
</div>
<div class="table-responsive">
   <table class="table table-striped" id="tabla_instituciones">
       <thead class="thead-dark">
           <tr>
               <th>ID</th>
               <th>Estado</th>
               <th>Municipio</th>
               <th>Localidad</th>
               <th>Nivel escolar</th>
               <th>Turno</th>
               <th>Nombre de la institución</th>
               <th>Calle</th>
               <th>Colonia</th>
               <th>Codigo postal</th>
               <th>Fecha de registro</th>
               <th>Clave institucional</th>
               <th>Telefono</th>
               <th>Correo</th>
               <th>Contraseña</th>
               <th>Acceso</th>
               <th>Opciones</th>
           </tr>
       </thead>
   </table>
</div>
<!-- Modal instituciones -->
<div class="modal fade" id="modal_institucion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Institución</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="email" id="correo" placeholder="Correo de contacto" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="clave_institucional">Contraseña:</label>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" placeholder="Telefono">
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
                            <label for="nombre">Nombre de la institución:</label>
                            <input type="text" class="form-control" id="nombre_institucion" placeholder="Nombre de la institución">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="turno">Turno:</label>
                            <select name="" id="turno" class="form-control">
                                <option value="0" selected>-Selecciona-</option>
                                @foreach ($turnos as $item)
                                    <option value="{{ $item->int_IdTurno }}">{{ $item->vch_Turno}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="turno">Nivel escolar:</label>
                            <select name="" id="nivel_escolar" class="form-control">
                                <option value="0" selected>-Selecciona-</option>
                                @foreach ($niveles_escolares as $item)
                                    <option value="{{ $item->int_IdNivelEscolar}}">{{ $item->vch_NombreNivelEscolar}}</option>   
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
                                <option value="0" selected>-Selecciona-</option>
                                @foreach ($estados as $item)
                                    <option value="{{ $item->chrClvEdo }}">{{ $item->vchNomEstado }}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="municipio">Municipio:</label>
                            <select id="municipio" class="form-control" onchange="cargar_localidades(this.value, 0)>
                                <option value="0" selected id="option_municipio">-Selecciona-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="localidad">Localidad:</label>
                            <select id="localidad" class="form-control">
                                <option value="0" selected>-Selecciona-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="calle">Calle:</label>
                            <input type="text" id="calle" placeholder="Calle" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="colonia">Colonia:</label>
                            <input type="text" id="colonia" placeholder="Colonia" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="codigo_postal">Codigo postal:</label>
                            <input type="text" id="codigo_postal" placeholder="Codigo postal" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" id="id_institucion" hidden>
                            <label for="clave_institucional">Clave institucional:</label>
                            <input type="text" class="form-control" id="clave_institucional" placeholder="Clave institucional" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="acceso">¿Dar acceso?</label>
                            <select id="acceso" class="form-control">
                                <option value="0">-Selecciona-</option>
                                <option value="1">-Si-</option>
                                <option value="2">-No-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_registro">Fecha de registro</label>
                            <input type="text" id="fecha_registro" placeholder="Fecha registro" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_editar">Modificar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endsection
