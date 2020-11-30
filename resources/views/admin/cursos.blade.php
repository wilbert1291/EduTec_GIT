@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Cursos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_cursos" id="nuevo_curso">Agregar nuevo curso</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="tabla_cursos">
        <thead class="thead-dark">
            <tr>
                <th>
                    Clave del curso
                </th>
                <th>
                    Categoria
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Descripcion
                </th>
                <th>
                    Opciones
                </th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal de cursos -->
<div class="modal fade" id="modal_cursos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal">Cursos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <input type="text" id="id_curso" hidden>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoria">Nombre del curso:</label>
                            <input type="text" class="form-control" placeholder="Nombre del curso" id="nombre_curso" name="nombre_curso" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select id="categoria" class="form-control">
                                <option value="0">-Selecciona-</option>
                                @foreach ($categorias as $item)
                                    <option value="{{ $item->int_IdCategoria }}">{{ $item->vch_NombreCategoria }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="mostrar">Descripción</label>
                            <textarea id="descripcion" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="btn_editar">Modificar</button>
                <button type="button" class="btn btn-success" id="btn_guardar">Gurdar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>


        </div>
    </div>
</div>
@endsection
