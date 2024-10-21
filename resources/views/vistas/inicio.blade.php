@extends('layouts.master')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Agregar Productos</h5>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($mensaje = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{$mensaje}}
                            </div>
                            @endif
                        </div>
                    </div>

                    <h5 class="card-title text-center">Listado de Productos</h5>

                    <!-- Formulario de búsqueda -->
                    
                    <form action="{{ route('productos.index') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="buscar" class="form-control" placeholder="Buscar por SKU o Nombre" value="{{ request('buscar') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>

                    <a href="{{route('productos.create')}}" class="btn btn-primary">
                        <span class="fa-solid fa-user-plus"></span> Agregar nuevo producto
                    </a>

                    <hr>

                    <p class="card-text">
                    <div class="table table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <th>id</th>
                                <th>SKU</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @foreach ($datos as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->sku}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->precio}}</td>
                                    <td>{{$item->categoria}}</td>
                                    <td>
                                        <form action="{{route ('productos.edit', $item->id)}}" method="GET">
                                            <button class="btn btn-warning btn-sm">
                                                <span class="fa-solid fa-user-pen"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route ('productos.show', $item->id)}}" method="GET">
                                            <button class="btn btn-danger btn-sm">
                                                <span class="fa-solid fa-trash"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            {{$datos->links()}}
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
