<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveles_escolares extends Model
{
    use HasFactory;

    protected $table = 'tbl_niveles_escolares';
    protected $primaryKey = 'int_IdNivelEscolar';
    protected $fillable = ['int_IdNivelEscolar', 'vch_NombreNivelEscolar', 'bit_Activo'];
}
