@extends('layouts.institute')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Suscripción - Historial de suscripciones</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_paquetes" id="nuevo_paquete">Comprar nuevo paquete</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="tabla_suscripciones">
        <thead class="thead-dark">
            <tr>
                <th>
                    id
                </th>
                <th>
                    Metodo de pago utilizado
                </th>
                <th>
                    Paquete comprado
                </th>
                <th>
                    Fecha que se realizo la compra
                </th>
                <th>
                    Vencimiento del paquete
                </th>
                <th>
                    id metodo
                </th>
                <th>
                    id paquete
                </th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal suscripcion -->

<div class="modal fade" id="modal_paquetes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal">Paquetes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="text" id="id_user" hidden>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paquete">Selecciona un paquete:</label>
                            <select id="paquete" class="form-control">
                                <option value="0">-Selecciona-</option>
                                @foreach ($paquetes as $item)
                                    <option value="{{ $item->int_IdPaquete}}">{{ $item->vch_NombrePaquete}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_guardar">Suscribirse</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@endsection