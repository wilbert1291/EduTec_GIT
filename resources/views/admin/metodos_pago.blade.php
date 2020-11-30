@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Metodos de pago</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_metodos_pago" id="nuevo_metodo_pago">Agregar nuevo metodo de pago</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="tabla_metodos_pago">
        <thead class="thead-dark">
            <tr>
                <th>
                    Clave del metodo de pago
                </th>
                <th>
                    Nombre del metodo de pago
                </th>
                <th>
                    Opciones
                </th>
            </tr>
        </thead>
    </table>
</div>
<!-- Modal metodos de pago -->

<div class="modal fade" id="modal_metodos_pago" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal">Metodos de pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <input type="text" id="id_metodo_pago" hidden>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoria">Nombre del metodo de pago:</label>
                            <input type="text" class="form-control" placeholder="Nombre del metodo de pago" id="nombre_metodo_pago" required>
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
