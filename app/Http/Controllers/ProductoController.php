<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Log;
use App\Models\Bodega;
use App\Models\proveedores;
use App\Models\cat_product;
use Illuminate\Support\Facades\DB;

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
        $datos = $query->orderBy('id', 'asc')->paginate(4);

        // Devolver la vista con los productos filtrados
        return view('vistas.inicio', compact('datos'));
        
    }

    public function create()
    {
        $categorias = cat_product::all();
        $proveedores = proveedores::all();
        $bodegas = Bodega::all();
        return view('vistas.Crud_Product.agregar', compact('categorias', 'proveedores', 'bodegas'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'sku' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'id_categoria' => 'required|integer',
            'id_proveedor' => 'required|integer',
            'id_bodega' => 'required|integer',
            'cantidad' => 'required|numeric',
            'precio_total' => 'required|numeric',
        ]);

        try {
            // Verificar si el producto ya existe
            $producto = Producto::where('sku', $validatedData['sku'])->first();

            if ($producto) {
                // Si el producto ya existe, actualizar la cantidad
                $producto->cantidad += $validatedData['cantidad'];
                $producto->precio_total = $producto->cantidad * $producto->precio;
                $producto->save();
            } else {
                // Si el producto no existe, crear un nuevo registro
                $producto = new Producto();
                $producto->sku = $validatedData['sku'];
                $producto->nombre = $validatedData['nombre'];
                $producto->precio = $validatedData['precio'];
                $producto->id_categoria = $validatedData['id_categoria'];
                $producto->id_proveedor = $validatedData['id_proveedor'];
                $producto->id_bodega = $validatedData['id_bodega'];
                $producto->cantidad = $validatedData['cantidad'];
                $producto->precio_total = $validatedData['cantidad'] * $validatedData['precio'];
                //dd($producto);
                $producto->save();
            }

            return redirect()->route('productos.index')->with('success', 'Producto agregado o actualizado con éxito!');
        } catch (\Exception $e) {
            Log::error('Error al guardar el producto: ' . $e->getMessage());
            return redirect()->route('productos.create')->with('error', 'Hubo un error al guardar el producto. Por favor, inténtalo de nuevo.');
        }
    }

    public function show($id)
    {
        //servira para obtener un registro de nuestra tabla
        $productos = Producto::find($id);
        return view('vistas.Crud_Product.eliminar', compact('productos'));
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
        $categorias = cat_product::all();
        $productos = Producto::find($id);
        
        return view('vistas.Crud_Product.actualizar', compact('productos', 'categorias'));
        
    }

    public function update(Request $request, $id)
    {
        //este metodo actualiza los datos en la DB
        //le digo que me busque a esa persona
        $productos = Producto::find($id);
        $productos->sku = $request->post('sku');
        $productos->nombre = $request->post('nombre');
        $productos->precio = $request->post('precio');
        $productos->id_categoria = $request->post('id_categoria');
        $productos->id_proveedor = $request->post('id_proveedor');
        $productos->id_bodega = $request->post('id_bodega');
        $productos->cantidad = $request->post('cantidad');
        $productos->precio_total = $request->post('precio_total');
        //con este metodo save guarda los datos que traiga en el formulario
        $productos->save();

        return redirect()->route("productos.index")->with("success", "Actualizado con exito!");
    }
}