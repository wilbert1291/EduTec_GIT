<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calificaciones extends Model
{
    use HasFactory;

    protected $table = 'tbl_calificaciones';
    protected $primaryKey = 'int_IdCalificaciones';
    protected $fillable = ['int_IdCalificaciones', 'int_IdCurso', 'int_IdAlumno', 'flt_Calificacion', 'int_Aciertos', 'int_Errores'];
}
