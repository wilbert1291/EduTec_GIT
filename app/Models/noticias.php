<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticias extends Model
{
    use HasFactory;
    protected $table = 'tbl_noticias';
    protected $primaryKey = 'int_IdNoticias';
    protected $fillable = ['int_IdNoticia', 'vch_Titulo', 'vch_Contenido', 'vch_Imagen'];
}
