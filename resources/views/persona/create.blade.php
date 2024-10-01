@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>Crear Persona Nueva</h1>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Formulario para crear un usuario -->
        <form action="{{ route('persona.store') }}" method="POST">
            @csrf  <!-- Protección CSRF -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="apellido" value="{{ old('apellido') }}" required>
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">fecha_nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Genero</label>
                <input type="text" name="genero" class="form-control" id="genero" value="{{ old('genero') }}" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">telefono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">direccion</label>
                <input type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion') }}" required>
            </div>
            <div class="mb-3">
                <label for="estado_civil" class="form-label">estado_civil</label>
                <input type="text" name="estado_civil" class="form-control" id="estado_civil" value="{{ old('estado_civil') }}" required>
            </div>
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">nacionalidad</label>
                <input type="text" name="nacionalidad" class="form-control" id="nacionalidad" value="{{ old('nacionalidad') }}" required>
            </div>
            <div class="mb-3">
                <label for="numero_identificacion" class="form-label">numero_identificacion</label>
                <input type="text" name="numero_identificacion" class="form-control" id="numero_identificacion" value="{{ old('numero_identificacion') }}" required>
            </div>
            <div class="mb-3">
                <label for="ocupacion" class="form-label">ocupacion</label>
                <input type="text" name="ocupacion" class="form-control" id="ocupacion" value="{{ old('ocupacion') }}" required>
            </div>

            <button type="submit" class="btn btn-outline-success">Crear una Persona</button>
        </form>
    </div>
    <a href="{{ route('persona.index') }}" class="btn btn-danger">Volver</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
