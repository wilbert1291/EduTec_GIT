<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'int_IdUsuario';

    protected $fillable = ['int_IdUsuario', 'chrClvEdo', 'chrNumMunicipio', 'chrClvLocalidad', 'int_IdTipoUsuario', 'int_IdSexo',
        'name', 'vch_ApellidoPaterno', 'vch_ApellidoMaterno', 'email', 'vch_Telefono', 'vch_Curp', 'vch_Calle', 'vch_Colonia',
        'vch_CodigoPostal', 'password', 'vch_PreguntaSecreta', 'vch_RespuestaPSecreta', 'bit_Activo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'vch_Contrasenia',
        //'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/
}
