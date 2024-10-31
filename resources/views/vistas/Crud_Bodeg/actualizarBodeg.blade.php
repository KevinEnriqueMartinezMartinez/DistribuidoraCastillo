@extends('layouts.master')
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Actualizar Bodegas</h5>
                <div class="card-body">
                    <p class="card-text">
                    <form action="{{route ('bodegas.update', $bodega->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" Required value="{{$bodega->nombre}}">
                        <label for="">Ubicación</label>
                        <input type="text" name="ubicacion" class="form-control" Required value="{{$bodega->ubicacion}}">
                        <br>
                        <a href="{{route ('bodegas.index') }}" class="btn btn-info">Regresar</a>
                        <button class="btn btn-warning">Actualizar</button>
                    </form>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection