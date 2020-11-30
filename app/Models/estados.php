<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    use HasFactory;
    protected $table = 'tbl_estados';
    protected $primaryKey = 'chrClvEdo';
    protected $fillable = ['chrClvEdo', 'vchNomEstado'];
}
