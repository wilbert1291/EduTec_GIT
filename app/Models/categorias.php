<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    protected $table = 'tbl_categorias';
    protected $primaryKey = 'int_IdCategoria';
    protected $fillable = ['int_IdCategoria','vch_NombreCategoria', 'bit_Activo', 'vch_Imagen'];
}
