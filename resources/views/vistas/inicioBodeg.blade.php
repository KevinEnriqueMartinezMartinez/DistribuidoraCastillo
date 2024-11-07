@extends('layouts.master')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Agregar Bodegas</h5>
                
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

                    <h5 class="card-title text-center">Listado de Bodegas</h5>

                    <!-- Formulario de búsqueda -->
                    
                    <form action="{{ route('bodegas.index') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre o la ubicación" value="{{ request('buscar') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>

                    <a href="{{route('bodegas.create')}}" class="btn btn-primary">
                        <span class="fa-solid fa-user-plus"></span> Agregar nueva bodega
                    </a>

                    <hr>

                    <p class="card-text">
                    <div class="table table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <th>id</th>
                                <th>Nombre</th>  
                                <th>Ubicacion</th>        
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @foreach ($datos as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->ubicacion}}</td>
                                    <td>
                                        <form action="{{route ('bodegas.edit', $item->id)}}" method="GET">
                                            <button class="btn btn-warning btn-sm">
                                                <span class="fa-solid fa-user-pen"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route ('bodegas.show', $item->id)}}" method="GET">
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