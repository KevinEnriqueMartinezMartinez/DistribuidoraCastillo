@extends('layouts.master')
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Eliminar una Producto</h5>
                <div class="card-body">
                 
                  <p class="card-text">
                  <div class="alert alert-danger" role="alert">
                          Estas seguro de Eliminar este Producto!!!
              
                          <table class="table table-sm table-hover table-bordered" style="background-color: white">
                              <thead>
                                  <th>id</th>
                                  <th>SKU</th>
                                  <th>Nombre</th>
                                  <th>Precio</th>
                                  <th>Categoria</th>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>{{$productos->id}}</td>
                                      <td>{{$productos->sku}}</td>
                                      <td>{{$productos->nombre}}</td>
                                      <td>{{$productos->precio}}</td>
                                      <td>{{$productos->categoria}}</td>
                                  </tr>
                              </tbody>
                          </table>
                          <hr>
                          <form action="{{ route('productos.destroy', $productos->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <a href="{{route('productos.index')}}" class="btn btn-info">
                              <i class="fa-solid fa-rotate-left"></i> Regresar</a>
                              <button class="btn btn-danger">
                              <span class="fa-solid fa-trash"></span> Eliminar</button>
                          </form>
                       </div>
                      
                  </p>
                 
                </div>
              </div>
        </div>
    </div>
</div>

@endsection