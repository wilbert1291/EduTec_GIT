<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnos extends Model
{
    use HasFactory;

    protected $table = 'tbl_alumnos';
    protected $primaryKey = 'int_IdAlumno';
    protected $fillable = ['int_IdAlumno', 'int_IdInstitucion', 'int_IdUsuario', 'int_IdProfesor', 'chr_Grupo', 'chr_Semestre'];
}
