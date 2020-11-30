<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial_calificaciones extends Model
{
    use HasFactory;
    protected $table = 'tbl_historial_calificaciones';
    protected $primaryKey = 'int_IdHistorialCalificaciones';
    protected $fillable = ['int_IdHistorialCalificaciones', 'int_IdAlumno', 'int_IdCurso', 'flt_Calificacion', 'dt_Fecha'];
}
