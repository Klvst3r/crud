@extends('layouts.app')

@section('content')


  
    <div class="card-body">
      <h5 class="card-title">Añadir un libro</h5>
        <form method= "POST" action="{{ route('libro.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre: </label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción: </label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor: </label>
                <input type="text" class="form-control" id="autor" name="autor" required>
            </div>
            <button type="submit" class="form-control btn btn-success mt-3">Guardar</button>
        </form>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{-- capturamos el valor de la sesion --}}
            {{ session('success') }}
        </div>
        @endif
    </div>


@endsection