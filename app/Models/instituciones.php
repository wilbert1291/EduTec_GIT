<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instituciones extends Model
{
    use HasFactory;

    protected $table = 'tbl_instituciones';
    protected $primaryKey = 'int_IdInstitucion';
    protected $fillable = ['int_IdInstitucion', 'int_IdNivelEscolar', 'vch_ClvInstitucional','int_IdTurno', 'dt_FechaRegistro', 'int_IdUsuario'];
}
