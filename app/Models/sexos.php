<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sexos extends Model
{
    use HasFactory;
    protected $table = 'tbl_sexos';
    protected $primaryKey = 'int_IdSexo';
    protected $fillable = ['int_IdSexo', 'vch_Sexo', 'bit_Activo'];
}
