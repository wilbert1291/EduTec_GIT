<?php

namespace App\Http\Controllers;

use App\Models\sexos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SexosController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //*************************************Categorias-Admin******************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_admin()
    {
        return view('admin/sexos');
    }

    public function show_admin()
    {
        $sexos = [];
        $datos = DB::table('tbl_sexos')->get();
        
        foreach ($datos as $key) {
            $sexo['clave_sexo'] = $key->int_IdSexo;
            $sexo['nombre_sexo'] = $key->vch_Sexo;
            $sexo['acceso'] = $key->bit_Activo;
            array_push($sexos, $sexo);
        }
        return json_encode(array('data'=>$sexos));        
    }

    public function create_admin($nombre, $activo)
    {
        try{
        sexos::create([
            'vch_Sexo' => $nombre,
            'bit_Activo' => $activo,
        ]);
            return true;
        } catch (Exception $e){
            return "Ha ocurrido un error";
        }
        
    }

    public function update_admin($id, $nombre, $activo)
    {
        try{
            DB::table('tbl_sexos')->where('int_IdSexo', '=', $id)->update([
                'vch_Sexo'=>$nombre, 
                'bit_Activo' => $activo,
            ]);
            return true;
        } catch (Exception $e){
            return "Ha ocurrido un error";
        }
    }

    public function delete_admin($id)
    {
        DB::table('tbl_sexos')->where('int_IdSexo', '=', $id)->delete();
        return true;
    }
}
