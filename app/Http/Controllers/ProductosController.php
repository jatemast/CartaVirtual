<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;

class ProductosController extends Controller
{

    // Mostrar productos en la vista welcome
    public function index()
    {
        $categorias = Categoria::all(); // Obtienes todas las categorías
        // Obtienes los productos con sus categorías y los paginas (10 productos por página)
        $productos = Producto::with('categoria')->paginate(10);

        return view('productos.index', compact('categorias', 'productos')); // Pasas ambas variables a la vista
    }

    // Mostrar formulario para crear un nuevo producto

    public function create()
    {
        $categorias = Categoria::all(); // Obtienes todas las categorías

        return view('productos.create', compact('categorias')); // Pasas las categorías a la vista
    }
// Mostrar los detalles de un producto
public function show($id)
{
    $producto = Producto::with('categoria')->findOrFail($id);
    return view('productos.show', compact('producto'));
}



    // Guardar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'foto' => 'nullable|image',
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string',
        ]);

        $producto = new Producto($request->all());

        if ($request->hasFile('foto')) {
            $producto->foto = $request->file('foto')->store('productos', 'public');
        }

        $producto->save();

        return redirect()->back()->with('success', 'Producto agregado exitosamente.');
    }
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar un producto existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'foto' => 'nullable|image',
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->fill($request->all());

        if ($request->hasFile('foto')) {
            $producto->foto = $request->file('foto')->store('productos', 'public');
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');

    }

    public function destroy($id)
{
    $producto = Producto::findOrFail($id);
    $producto->delete();

    return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
}


    // Filtrar productos por AJAX
    public function filter(Request $request)
    {
        $query = Producto::query();

        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        $productos = $query->with('categoria')->get();

        return response()->json($productos);
    }
}
