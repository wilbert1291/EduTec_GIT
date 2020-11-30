<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metodos_pago extends Model
{
    use HasFactory;
    protected $table = 'tbl_metodos_pago';
    protected $primaryKey = 'int_IdMetodoPago';
    protected $fillable = ['int_IdMetodoPago', 'vch_MetodoPago'];
}
