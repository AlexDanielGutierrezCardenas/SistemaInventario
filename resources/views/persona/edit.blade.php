@extends('layouts.app')
@section('content')
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <h3>Update Persona</h3>
            <form action="{{ route('persona.update', $persona->id_persona) }}" method="post">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $persona->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="apellido" value="{{ $persona->apellido }}" required>
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">fecha_nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="{{ $persona->fecha_nacimiento }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $persona->email }}" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Genero</label>
                <input type="text" name="genero" class="form-control" id="genero" value="{{ $persona->genero }}" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">telefono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" value="{{ $persona->telefono }}" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">direccion</label>
                <input type="text" name="direccion" class="form-control" id="direccion" value="{{ $persona->direccion}}" required>
            </div>
            <div class="mb-3">
                <label for="estado_civil" class="form-label">estado_civil</label>
                <input type="text" name="estado_civil" class="form-control" id="estado_civil" value="{{ $persona->estado_civil }}" required>
            </div>
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">nacionalidad</label>
                <input type="text" name="nacionalidad" class="form-control" id="nacionalidad" value="{{ $persona->nacionalidad }}" required>
            </div>
            <div class="mb-3">
                <label for="numero_identificacion" class="form-label">numero_identificacion</label>
                <input type="text" name="numero_identificacion" class="form-control" id="numero_identificacion" value="{{ $persona->numero_identificacion }}" required>
            </div>
            <div class="mb-3">
                <label for="ocupacion" class="form-label">ocupacion</label>
                <input type="text" name="ocupacion" class="form-control" id="ocupacion" value="{{ $persona->ocupacion }}" required>
            </div>
              <button type="submit" class="btn mt-3 btn-outline-primary">Update Post</button>
            </form>
          </div>
        </div>
      </div>
@endsection