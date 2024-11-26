@extends('layouts.app')

@section('content')

<h1>Listado de Libros</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nombres</th>
        <th scope="col">Descripción</th>
        <th scope="col">Autor</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($libros as $libro)
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $libro->nombre }}</td>
        <td>{{ $libro->descripcion }}</td>
        <td>{{ $libro->autor }}</td>

        
        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $libro->id }}">Actualizar</button></td>
        {{-- Incluimos todo el codido para actualizar con la siguiente linea --}}
        @include('libro.update') 
      </tr>
      @endforeach
    
    </tbody>
  </table>
  
  @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{-- capturamos el valor de la sesion --}}
        {{ session('success') }}
    </div>
 @endif



@endsection