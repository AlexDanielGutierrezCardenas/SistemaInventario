@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>Crear distribuidora Nuevo</h1>

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
    
        <form action="{{ route('distribuidora.store') }}" method="POST">
            @csrf 
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="id_persona" class="form-label">Nombre del Distribuidor</label>
                    <select name="id_proveedor" id="id_proveedor" class="form-control">
                        <option value="">Seleccione un proveedor</option>
@foreach($personas as $id_persona => $nombre)
    @php
        // Verificar si la persona está en la tabla de proveedores
        $proveedor = $proveedors->firstWhere('id_persona', $id_persona);
        // Si la persona es proveedor, obtener su llave primaria (id_proveedor)
        $proveedorExists = !is_null($proveedor);
        $proveedorId = $proveedorExists ? $proveedor->id_proveedor : null;  // Asumimos que la llave primaria se llama 'id_proveedor'

        // Verificar si el proveedor ya existe en la tabla distribuidoras
        $distribuidoraExists = $distribuidoras->contains('id_proveedor', $proveedorId);
    @endphp
    @if($proveedorExists)
        <option value="{{ (int) $proveedorId }}" 
            {{ $distribuidoraExists ? 'disabled' : '' }} 
            style="background-color: {{ $distribuidoraExists ? '#f8d7da' : '#d4edda' }}; color: {{ $distribuidoraExists ? '#721c24' : '#155724' }}">
            {{ $nombre }} {{ $distribuidoraExists ? '(Distribuidora asignada)' : '' }}
        </option>
    @endif
@endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">direccion</label>
                <input type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion') }}" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">telefono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
            </div>

            <button type="submit" class="btn btn-outline-success">Crear una Persona</button>
        </form>
    </div>
    <a href="{{ route('persona.index') }}" class="btn btn-danger">Volver</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
