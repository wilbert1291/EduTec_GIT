@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Historial de pagos</h1>
</div>
<div class="table-responsive">
    <table class="table table-striped" id="tabla_historial">
        <thead class="thead-dark">
            <tr>
                <th>
                    id
                </th>
                <th>
                    Institucion
                </th>
                <th>
                    Metodo de pago
                </th>
                <th>
                    Paquete
                </th>
                <th>
                    Fecha de pago
                </th>
                <th>
                    Fecha que expira el paquete
                </th>
            </tr>
        </thead>
    </table>
</div>
<!-- Modal historial de pagos -->
<!-- No existe-->
@endsection
