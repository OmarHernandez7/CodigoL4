<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria; 


class CategoriasController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
        ]);
        
        $categoria = new Categoria();
        $categoria->nombre=$request->input('nombre');

        if ($categoria->save()){
         $mensaje = "La categoria se creo Exitosamente"; 
        }
        
        else{
          $mensaje = "La categoria no se creo exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje',$mensaje);
    }

}
