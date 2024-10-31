@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <h5 class="card-header">Mantenimiento de Productos</h5>
        <div class="card-body">

          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif

          <p class="card-text">
          <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <label for="">SKU</label>
            <input type="text" name="sku" class="form-control" Required>
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control" Required>
            <label for="">Precio Unitario</label>
            <input type="number" name="precio" class="form-control" id="precio" min="0" step="0.01" required>
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" id="cantidad" min="0" step="1" required>
            <label for="">Precio Total</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="number" name="precio_total" class="form-control" id="precio_total" min="0" step="0.01" readonly>
            </div>
            {{-- se crea un select para seleccionar la categoria --}}
            <label for="">Categoria</label>
            <select class="form-select" name="id_categoria" id="categorias" class="form-control" required>
              <option value="">Seleccione una Categoria</option>
              @foreach($categorias as $categoria)
              <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
              @endforeach
            </select>
            {{-- se crea un select para seleccionar el proveedor --}}
            <label for="">Proveedor</label>
            <select class="form-select" name="id_proveedor" id="proveedores" class="form-control" required>
              <option value="">Seleccione un proveedor</option>
              @foreach($proveedores as $proveedor)
              <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
              @endforeach
            </select>
            {{-- se crea un select para seleccionar la bodega --}}
            <label for="">Bodega</label>
            <select class="form-select" name="id_bodega" id="bodega" class="form-control" required>
              <option value="">Seleccione una bodega</option>
              @foreach($bodegas as $bodega)
              <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
              @endforeach
            </select>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const precioInput = document.getElementById('precio');
    const cantidadInput = document.getElementById('cantidad');
    const precioTotalInput = document.getElementById('precio_total');

    function calcularPrecioTotal() {
        const precio = parseFloat(precioInput.value) || 0;
        const cantidad = parseFloat(cantidadInput.value) || 0;
        const precioTotal = precio * cantidad;
        precioTotalInput.value = precioTotal.toFixed(2);
    }

    precioInput.addEventListener('input', calcularPrecioTotal);
    cantidadInput.addEventListener('input', calcularPrecioTotal);
});
</script>
@endsection