@extends('layouts.master')
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Actualizar Nuevo Producto</h5>
                <div class="card-body">
                  <p class="card-text">
                      <form action="{{route ('productos.update', $productos->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                          <label for="">SKU</label>
                          <input type="text" name="sku" class="form-control" Required value="{{$productos->sku}}">
                          <label for="">Nombre</label>
                          <input type="text" name="nombre" class="form-control" Required value="{{$productos->nombre}}">
                          <label for="">Precio</label>
                          <input type="number" name="precio" class="form-control" min="0" step="0.01" required value="{{$productos->precio}}">
                          <label for="">Categoria</label>
                          <input type="text" name="categoria" class="form-control" Required value="{{$productos->categoria}}">
                          <br>
                          <a href="{{route ('productos.index') }}" class="btn btn-info">Regresar</a>
                          <button class="btn btn-warning">Actualizar</button>
                          
                     </form>
                  </p>
                 
                </div>
              </div>
        </div>
    </div>
</div>

@endsection