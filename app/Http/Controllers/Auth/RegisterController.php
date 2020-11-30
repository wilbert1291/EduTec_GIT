<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\instituciones;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $usuario = User::create([
            'chrClvEdo' => $data['estado'],
            'chrNumMunicipio' => $data['municipio'],
            'chrClvLocalidad' => $data['localidad'],
            'int_IdTipoUsuario' => 2,
            'int_IdSexo' => 3,
            'name' => $data['name'],
            'vch_ApellidoPaterno' => "",
            'vch_ApellidoMaterno' => "",
            'email' => $data['email'],
            'vch_Telefono' => $data['telefono'],
            'vch_Curp' => md5($data['clave_institucional']),
            'vch_Calle' => $data['calle'],
            'vch_Colonia' => $data['colonia'],
            'vch_CodigoPostal' => $data['CP'],
            'password' => Hash::make($data['password']),
            'vch_PreguntaSecreta' => "",
            'vch_RespuestaPSecreta' => "",
            'bit_Activo' => 1,
        ]);

        $instituto = instituciones::create([
            'vch_ClvInstitucional' => $data['clave_institucional'],
            'int_IdNivelEscolar' => $data['nivel_escolar'],
            'int_IdTurno' => $data['turno'],
            'dt_FechaRegistro' => date("Y-m-d"),
            'int_IdUsuario' =>  DB::getPdo()->lastInsertId(),
        ]);

        return $usuario;
    }
}
