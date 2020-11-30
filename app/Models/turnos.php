<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turnos extends Model
{
    use HasFactory;
    protected $table = 'tbl_turnos';
    protected $primaryKey = 'int_IdTurno';
    protected $fillable = ['int_IdTurno', 'vch_Turno'];
}
