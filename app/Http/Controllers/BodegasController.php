<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegasController extends Controller
{
    public function indexBodeg(Request $request)
    {
        // Crear la consulta base
        $query = Bodega::query();

        // Verificar si hay un término de búsqueda
        if ($request->filled('buscar')) {
            $buscar = $request->input('buscar');
            // Filtrar por nombre o ubicacion
            $query->where('nombre', 'like', "%$buscar%")
                  ->orWhere('ubicacion', 'like', "%$buscar%");
        }

        // Obtener los productos paginados
        $datos = $query->orderBy('id', 'asc')->paginate(4);

        // Devolver la vista con los productos filtrados
        return view('vistas.inicioBodeg', compact('datos'));
    }

    public function createBodeg()
    {
        return view('vistas.Crud_Bodeg.agregarBodeg');
    }

    public function storeBodeg(Request $request)
    {
        $bodega = new Bodega();
        $bodega->nombre = $request->post('nombre');
        $bodega->ubicacion = $request->post('ubicacion');
        $bodega->save();

        return redirect()->route('bodegas.index')->with('success', 'Bodega agregada con exito!');
    }

    public function showBodeg($id)
    {
        //servira para obtener un registro de nuestra tabla
        $bodega = Bodega::find($id);
        return view('vistas.Crud_Bodeg.eliminarBodeg', compact('bodega'));
    }

    public function destroyBodeg($id)
    {
        //elimina 
        $bodega = Bodega::find($id);
        $bodega->delete();
        return redirect()->route("bodegas.index")->with("success", "Bodega eliminada con exito con exito!");
    }

    public function editBodeg($id)
    {
        //consulta con eloquent
        $bodega = Bodega::find($id);
        
        return view('vistas.Crud_Bodeg.actualizarBodeg', compact('bodega'));
        
    }

    public function updateBodeg(Request $request, $id)
    {
        //este metodo actualiza los datos en la DB
        //le digo que me busque a esa persona
        $bodega = Bodega::find($id);
        $bodega->nombre = $request->post('nombre');
        $bodega->ubicacion = $request->post('ubicacion');
        //con este metodo save guarda los datos que traiga en el formulario
        $bodega->save();

        return redirect()->route("bodegas.index")->with("success", "Bodega actualizada con exito!");
    }
}
