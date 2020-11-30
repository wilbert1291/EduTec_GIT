<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    use HasFactory;

    protected $table = 'tbl_cursos';
    protected $primaryKey = 'int_IdCurso';
    protected $fillable = ['int_IdCurso', 'int_IdCategoria', 'vch_NombreCurso', 'vch_Descripcion'];
}
