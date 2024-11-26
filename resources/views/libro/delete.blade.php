@extends('layouts.app')

@section('content')

 
    <div class="card-body">
      <h5 class="card-title">Eliminar un libro</h5>
        <form method= "POST" action="{{ route('libro.destroy') }}">
            @csrf
            <div class="form-group">
                <label for="nombre">Id del libro: </label>
                <input type="text" class="form-control" id="IdLibro" name="IdLibro" required>
            </div>
            
            <button type="submit" class="form-control btn btn-danger mt-3">Eliminar</button>
        </form>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{-- capturamos el valor de la sesion --}}
            {{ session('success') }}
        </div>
        @endif
    </div>


@endsection