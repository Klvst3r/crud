<!-- Modal -->
<div class="modal fade" id="modal{{ $libro->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card-body">


                <h5 class="card-title">Añadir un libro</h5>


                <form method="POST" action="{{ route('libro.update', $libro->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $libro->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción: </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $libro->descripcion }}" required>
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor: </label>
                        <input type="text" class="form-control" id="autor" name="autor" value="{{ $libro->autor }}" required>
                    </div>
                    <button type="submit" class="form-control btn btn-success mt-3">Actualizar</button>
                </form>

                
                  @if(session('success'))
                  <div class="alert alert-success" role="alert">
                      {{-- capturamos el valor de la sesion --}}
                      {{ session('success') }}
                  </div>
                  @endif
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  