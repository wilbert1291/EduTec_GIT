<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_usuarios extends Model
{
    use HasFactory;

    protected $table = 'tbl_tipo_usuarios';
    protected $primaryKey = 'int_IdTipoUsuario';
    protected $fillable = ['int_IdTipoUsuario', 'vch_TipoUsuario'];
}
