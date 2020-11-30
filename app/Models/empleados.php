<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    use HasFactory;

    protected $table = 'tbl_empleados';
    protected $primaryKey = 'int_IdEmpleado';
    protected $fillable = ['int_IdEmpleado', 'vch_fotografia', 'int_IdUsuario', 'vch_descripcion'];
}
