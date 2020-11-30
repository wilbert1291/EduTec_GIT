<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesores extends Model
{
    use HasFactory;
    protected $table = 'tbl_profesores';
    protected $primaryKey = 'int_IdProfesor';
    protected $fillable = ['int_IdProfesor', 'int_IdInstitucion', 'int_IdUsuario'];
}
