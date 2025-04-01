<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
     // Mostrar todas las categorías
     public function index()
     {
         // Obtener todas las categorías con sus productos
         $categorias = Categoria::with('productos')->get();

         return view('categorias.index', compact('categorias'));  // Muestra la vista con las categorías
     }

     // Mostrar el formulario para crear una nueva categoría
     public function create()
     {
         return view('categorias.create');  // Esta vista tendrá el formulario de creación
     }

     public function store(Request $request)
     {
         // Validar los datos del formulario
         $request->validate([
             'nombre' => 'required|string|max:255|unique:categorias,nombre',
         ]);

         // Crear una nueva categoría
         $categoria = new Categoria();
         $categoria->nombre = $request->nombre;
         $categoria->save();  // Guardar en la base de datos

         // Redirigir con un mensaje de éxito
         return redirect()->route('categorias.create')->with('success', 'Categoría creada con éxito');
     }

     public function edit($id)
{
    $categoria = Categoria::findOrFail($id);
    return view('categorias.edit', compact('categoria'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $id,
    ]);

    $categoria = Categoria::findOrFail($id);
    $categoria->nombre = $request->nombre;
    $categoria->save();

    return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito'); 
}

public function destroy($id)
{
    $categoria = Categoria::findOrFail($id);
    $categoria->delete();

    return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito');
}
    }
