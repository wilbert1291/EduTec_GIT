<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localidades extends Model
{
    use HasFactory;
    protected $table = 'tbl_localidades';
    protected $primaryKey = 'intClvLocalidad';
    protected $fillable = ['intClvLocalidad', 'chrClvEdo', 'chrClvMunicipio', 'chrClvLocalidad', 'vchNomLocalidad'];
}
