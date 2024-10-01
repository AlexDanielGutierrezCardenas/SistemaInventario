@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>Crear Despachador Nuevo</h1>

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
    
        <form action="{{ route('despachador.store') }}" method="POST">
            @csrf 
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="id_persona" class="form-label">Persona:</label>
                    <select name="id_persona" id="id_persona" class="form-control">
                        <option value="">Seleccione una persona</option>
                        @foreach($personas as $id_persona => $nombre)
                            <option value="{{ (int) $id_persona }}"> {{$nombre}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="turno" class="form-label">turno</label>
                <input type="text" name="turno" class="form-control" id="empresa" value="{{ old('turno') }}" required>
            </div>
            <div class="mb-3">
                <label for="zona_asignada" class="form-label">zona_asignada</label>
                <input type="text" name="zona_asignada" class="form-control" id="tipo_producto" value="{{ old('zona_asignada') }}" required>
            </div>

            <div class="mb-3">
                <label for="fecha_contratacion" class="form-label">fecha_contratacion</label>
                <input type="date" name="fecha_contratacion" class="form-control" id="fecha_contrato" value="{{ old('fecha_contratacion') }}" required>
            </div>
            <div class="mb-3">
                <label for="estado_despachador" class="form-label">estado_despachador</label>
                <input type="text" name="estado_despachador" class="form-control" id="tipo_producto" value="{{ old('estado_despachador') }}" required>
            </div>

            <div class="mb-3">
                <label for="contacto" class="form-label">contacto</label>
                <input type="date" name="contacto" class="form-control" id="fecha_contrato" value="{{ old('contacto') }}" required>
            </div>

            <button type="submit" class="btn btn-outline-success">Crear despachador</button>
        </form>
    </div>
    <a href="{{ route('persona.index') }}" class="btn btn-danger">Volver</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
