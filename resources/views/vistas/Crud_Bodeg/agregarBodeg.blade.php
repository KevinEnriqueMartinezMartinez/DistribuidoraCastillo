@extends('layouts.master')
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Mantenimiento de Bodegas</h5>
                <div class="card-body">

                    <p class="card-text">
                    <form action="{{ route('bodegas.store') }}" method="POST">
                        @csrf
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" Required>
                        <label for="">Ubicacion</label>
                        <input type="text" name="ubicacion" class="form-control" Required>
                        <br>
                        <a href="{{route('bodegas.index')}}" class="btn btn-info">
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