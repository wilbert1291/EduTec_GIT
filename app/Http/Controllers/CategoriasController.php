<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    //***********************************************************************************************
    //***********************************************************************************************
    //*************************************Categorias-Admin******************************************
    //***********************************************************************************************
    //***********************************************************************************************
    public function index_admin()
    {
        return view('admin/categorias');
    }

    public function show_admin()
    {
        $categorias = [];
        $datos = DB::table('tbl_categorias')->get();
        
        foreach ($datos as $key) {
            $categoria['clave_categoria'] = $key->int_IdCategoria;
            $categoria['nombre_categoria'] = $key->vch_NombreCategoria;
            $categoria['activo'] = $key->bit_Activo;
            $categoria['imagen'] = $key->vch_Imagen;
            array_push($categorias, $categoria);
        }
        return json_encode(array('data'=>$categorias));        
    }

    public function create_admin($nombre, $activo)
    {
        try{
        categorias::create([
            'vch_NombreCategoria' => $nombre,
            'bit_Activo' => $activo,
            'vch_Imagen' => 'sin_imagen.jpg',
        ]);
            return true;
        } catch (Exception $e){
            return "Ha ocurrido un error";
        }
        
    }

    public function update_admin($id, $nombre, $activo)
    {
        try{
            DB::table('tbl_categorias')->where('int_IdCategoria', '=', $id)->update(['vch_NombreCategoria'=>$nombre, 'bit_Activo'=>$activo]);
            return true;
        } catch (Exception $e){
                return "Ha ocurrido un error";
        }
    }

    public function delete_admin($id)
    {
        DB::table('tbl_categorias')->where('int_IdCategoria', '=', $id)->delete();
    }
}
