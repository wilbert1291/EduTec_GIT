<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paquetes extends Model
{
    use HasFactory;

    protected $table = 'tbl_paquetes';
    protected $primaryKey = 'int_IdPaquete';
    protected $fillable = ['int_IdPaquete', 'vch_NombrePaquete', 'vch_Descripcion', 'vch_Tiempo', 'flt_precio', 'int_descuento', 'vch_imagen'];
}
