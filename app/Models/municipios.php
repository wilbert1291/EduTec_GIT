<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipios extends Model
{
    use HasFactory;
    protected $table = 'tbl_municipios';
    protected $primaryKey = 'intClvMunicipio';
    protected $fillable = ['intClvMunicipio', 'chrNumMunicipio', 'chrClvEdo', 'vchNomMunicipio'];
}
