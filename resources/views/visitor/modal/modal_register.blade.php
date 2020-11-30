<!-- Modal -->
<div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de institución</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('register')}}" method="post">
            <div class="modal-body">
            
                <div class="row">
                    <div class="col-md-12">
                        <h5>Datos de acceso</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="email" id="email_register" name="email_register" placeholder="Correo de contacto" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="clave_institucional">Contraseña:</label>
                            <input type="password" class="form-control" id="password_register" name="password_register" placeholder="Contraseña">
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
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la institución">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="turno">Turno:</label>
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
                            <label for="turno">Nivel escolar:</label>
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
                            <select id="estado" name="estado" class="form-control">
                                <option value="0" selected>-Selecciona-</option>
                                @foreach ($estados as $estado)
                                    <option value="{{$estado->chrClvEdo}}">{{$estado->vchNomEstado}}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="municipio">Municipio:</label>
                            <select id="municipio" name="municipio" class="form-control">
                                <option value="0" selected id="option_municipio">-Selecciona-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="localidad">Localidad:</label>
                            <select id="localidad" name="localidad" class="form-control">
                                <option value="0" selected>-Selecciona-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="calle">Calle:</label>
                            <input type="text" id="calle" name="calle" placeholder="Calle" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="colonia">Colonia:</label>
                            <input type="text" id="colonia" name="colonia" placeholder="Colonia" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="codigo_postal">Codigo postal:</label>
                            <input type="text" id="CP" name="CP" placeholder="Codigo postal" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="clave_institucional">Clave institucional:</label>
                            <input type="text" class="form-control" id="clave_institucional" name="clave_institucional" placeholder="Clave institucional">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="clave_institucional">Telefono institucional:</label>
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
    </div>
</div>
