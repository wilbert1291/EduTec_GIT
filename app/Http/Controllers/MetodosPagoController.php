<?php

namespace App\Http\Controllers;

use App\Models\metodos_pago;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetodosPagoController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //*************************************Categorias-Admin******************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_admin()
    {
        return view('admin/metodos_pago');
    }

    public function show_admin()
    {
        $metodos_pago = [];
        $datos = DB::table('tbl_metodos_pago')->get();
        
        foreach ($datos as $key) {
            $metodo_pago['clave_metodo_pago'] = $key->int_IdMetodoPago;
            $metodo_pago['nombre_metodo_pago'] = $key->vch_MetodoPago;
            array_push($metodos_pago, $metodo_pago);
        }
        return json_encode(array('data'=>$metodos_pago));        
    }

    public function create_admin($nombre)
    {
        try{
        metodos_pago::create([
            'vch_MetodoPago' => $nombre,
        ]);
            return true;
        } catch (Exception $e){
            return "Ha ocurrido un error";
        }
        
    }

    public function update_admin($id, $nombre)
    {
        try{
            DB::table('tbl_metodos_pago')->where('int_IdMetodoPago', '=', $id)->update([
                'vch_MetodoPago'=>$nombre, 
            ]);
            return true;
        } catch (Exception $e){
            return "Ha ocurrido un error";
        }
    }

    public function delete_admin($id)
    {
        DB::table('tbl_metodos_pago')->where('int_IdMetodoPago', '=', $id)->delete();
        return true;
    }
}
