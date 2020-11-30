<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial_pagos extends Model
{
    use HasFactory;
    protected $table = 'tbl_historial_pagos';
    protected $primaryKey = 'int_IdHistorialPago';
    protected $fillable = ['int_IdHistorialPago', 'int_IdInstitucion', 'int_IdMetodoPago', 'int_IdPaquete', 'dt_FechaPago', 'dt_FechaExpiracion'];
}
