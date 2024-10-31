<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        // Crear la consulta base
        $query = Producto::query();

        // Verificar si hay un término de búsqueda
        if ($request->filled('buscar')) {
            $buscar = $request->input('buscar');
            // Filtrar por SKU o Nombre
            $query->where('sku', 'like', "%$buscar%")
                  ->orWhere('nombre', 'like', "%$buscar%");
        }

        // Obtener los productos paginados
        $datos = $query->orderBy('id', 'desc')->paginate(4);

        // Devolver la vista con los productos filtrados
        return view('vistas.inicio', compact('datos'));
    }

    public function create()
    {
        return view('vistas.agregar');
    }

    public function store(Request $request)
    {
        $productos = new Producto();
        $productos->sku = $request->post('sku');
        $productos->nombre = $request->post('nombre');
        $productos->precio = $request->post('precio');
        $productos->categoria = $request->post('categoria');
        $productos->save();

        return redirect()->route('productos.index')->with('success', 'Agregado con éxito!');
    }

    public function show($id)
    {
        //servira para obtener un registro de nuestra tabla
        $productos = Producto::find($id);
        return view('vistas.eliminar', compact('productos'));
    }

    public function destroy($id)
    {
        //elimina 
        $productos = Producto::find($id);
        $productos->delete();
        return redirect()->route("productos.index")->with("success", "Eliminado con exito!");
    }

    public function edit($id)
    {
        //consulta con eloquent
        $productos = Producto::find($id);
        
        return view('vistas.actualizar', compact('productos'));
        
    }

    public function update(Request $request, $id)
    {
        //este metodo actualiza los datos en la DB
        //le digo que me busque a esa persona
        $productos = Producto::find($id);
        $productos->sku = $request->post('sku');
        $productos->nombre = $request->post('nombre');
        $productos->precio = $request->post('precio');
        $productos->categoria = $request->post('categoria');
        //con este metodo save guarda los datos que traiga en el formulario
        $productos->save();

        return redirect()->route("productos.index")->with("success", "Actualizado con exito!");
    }
}