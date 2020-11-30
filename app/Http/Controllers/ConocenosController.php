<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConocenosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['noticias']=DB::table('tbl_noticias')->get()->take(3);
        $datos['empleados']=DB::table('users')->join('tbl_empleados', 'users.int_IdUsuario', '=', 'tbl_empleados.int_IdUsuario')->get();
        return view('visitor/conocenos', $datos);
    }
}
