@extends('layouts.master')
@section('content')
<div class="container my-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <h5 class="card-header">Mantenimiento de Productos</h5>
        <div class="card-body">
         
          <p class="card-text">
              <form action="{{ route('productos.store') }}" method="POST">
                @csrf
                  <label for="">SKU</label>
                  <input type="text" name="sku" class="form-control" Required>
                  <label for="">Nombre</label>
                  <input type="text" name="nombre" class="form-control" Required>
                  <label for="">Precio</label>
                  <input type="number" name="precio" class="form-control" min="0" step="0.01" required>
                  <label for="">Categoria</label>
                  <input type="text" name="categoria" class="form-control" Required>
                  <br>
                  <a href="{{route('productos.index')}}" class="btn btn-info">
                  <i class="fa-solid fa-rotate-left"></i> Regresar</a>
                  <button class="btn btn-primary">
                  <i class="fa-solid fa-plus"></i> Agregar</button>
                  
             </form>
          </p>
         
        </div>
      </div>
    </div>
  </div>
</div>

@endsection