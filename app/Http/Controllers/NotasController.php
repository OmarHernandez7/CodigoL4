<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota; 
use App\Models\Categoria; 
class NotasController extends Controller
{
 
    public function index() 
    {
       
        $nota = Nota::paginate(10); 
        return view('Notas.NIndex')->with('notas',$nota);
                
    }

    public function create() 
    {
        $categorias = Categoria::all();

        return view('Notas.NCreate', compact('categorias'));

    }

    public function store(Request $request) 
    
    {
        $request->validate([ 
        'titulo'=>'required|regex:/[A-Z][a-z]+/i', 
        'contenido'=>'required|regex:/[A-Z][a-z]+/i',
        'categoria'=>'required',  
        'fecha'=>'required|date',

        ]);

        // MODELO
        $nota = new Nota();  
        $nota->titulo = $request->input('titulo');
        $nota->etiqueta = $request->input('etiqueta');
        $nota->fecha = $request->input('fecha');
    
        // Obtener la categoría del  formulario
        $categoria = Categoria::find($request->input('categoria'));

        $nota->categoria = $categoria->nombre;
        $nota->contenido = $request->input('contenido');

        if ($nota->save()) {
            $mensaje = "La Nota se creó exitosamente"; 
        } else {
            $mensaje = "La Nota no se creó exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje', $mensaje);
    }


    public function show(string $id)
    {
        
        $nota = Nota::findOrfail($id);
        return view('Notas.NShow' , compact('nota'));
        
    }

    public function edit(string $id)
    {
        $nota = Nota::findOrfail($id);
        $categorias = Categoria::all();

        return view('Notas.NEdit', compact('categorias'))->with('notas',$nota);
    }

    public function update(Request $request, string $id)
    {
        $nota = Nota::findOrfail($id);
        
        $request->validate([
            'titulo'=>'required|regex:/[A-Z][a-z]+/i',
            'contenido'=>'required|regex:/[A-Z][a-z]+/i',
            'categoria'=>'required',
            'fecha'=>'required|date',
        ]);

        $nota->titulo = $request->input('titulo');
        $nota->fecha = $request->input('fecha');
        $nota->etiqueta = $request->input('etiqueta');
    
        // Obtener la categoría del formulario
        $categoria = Categoria::find($request->input('categoria'));

        $nota->categoria = $categoria->nombre;
        $nota->contenido = $request->input('contenido');

        if ($nota->save()) {
            $mensaje = "La Nota se edito exitosamente"; 
        } else {
            $mensaje = "La Nota no se edito exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje', $mensaje);
    }

    public function destroy(string $id)
    {
        $borrados = Nota::destroy($id);
    
        if ($borrados > 0){
            $mensaje = "La Nota se elimino exitosamente"; 
           }
           
           else{
             $mensaje = "La Nota no se elimino exitosamente"; 
           }
   
           return redirect()->route('nota.index')->with('mensaje',$mensaje);
    }
}
