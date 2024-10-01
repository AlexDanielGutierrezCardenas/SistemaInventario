@extends('layouts.app')
@section('content')


<div class="container mt-5">
    <h1>Registrar Nuevo Empleado de la empresa</h1>

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

    <form action="{{ route('empleado.store') }}" method="POST">
        @csrf 
        <div class="col-md-6">
            <div class="mb-3">
                <label for="id_persona" class="form-label">Persona:</label>
                <select name="id_persona" id="id_persona" class="form-control">
                    <option value="">Seleccione una persona</option>
                        {{-- @foreach($personas as $id_persona => $nombre)
                            @php
                                $clienteExists = $clientes->contains('id_persona', $id_persona);
                                $proveedorExists = $proveedors->contains('id_persona', $id_persona);
                                $empleadoExists = $empleados->contains('id_persona', $id_persona); // Nueva comprobación
                                //$usuarioExists = $usuarios->contains('id_persona', $id_persona); // Nueva comprobación
                                $personaAsignada = $clienteExists || $proveedorExists || $empleadoExists; //|| $usuarioExists
                            @endphp
                            <option value="{{ (int) $id_persona }}" 
                            {{ $personaAsignada ? 'disabled' : '' }} 
                            style="background-color: {{ $personaAsignada ? '#f8d7da' : '#d4edda' }}; color: {{ $personaAsignada ? '#721c24' : '#155724' }}">
                            {{ $nombre }} {{ $personaAsignada ? '(Usuario ya asignado)' : '(Disponible)' }}
                            </option>
                        @endforeach --}}
                        @foreach($personas as $id_persona => $nombre)
                        @php
                            // Verificamos si la persona está en cada tabla
                            $usuarioExists = $users->contains('persona_id', $id_persona);
                            $clienteExists = $clientes->contains('id_persona', $id_persona);
                            $proveedorExists = $proveedors->contains('id_persona', $id_persona);
                            $empleadoExists = $empleados->contains('id_persona', $id_persona);
                            $usuarioConId1 = $usuarioExists && $users->where('persona_id', $id_persona)->first()->id == 1;
                            // Deshabilitar si no tiene usuario o si está asignada como cliente, proveedor o empleado
                            $personaAsignada = !$usuarioExists || $clienteExists || $proveedorExists || $empleadoExists|| $usuarioConId1;
                        @endphp
                        <option value="{{ (int) $id_persona }}" 
                            {{ $personaAsignada ? 'disabled' : '' }} 
                            style="background-color: {{ $personaAsignada ? '#f8d7da' : '#d4edda' }}; color: {{ $personaAsignada ? '#721c24' : '#155724' }}">
                            {{ $nombre }}
                            <!-- Mostrar en qué tablas está la persona -->
                            {{ !$usuarioExists ? '(No tiene usuario)' : '' }}
                            {{ $usuarioExists ? '(Usuario ya asignado)' : '' }}
                            {{ $clienteExists ? '(Cliente ya asignado)' : '' }}
                            {{ $proveedorExists ? '(Proveedor ya asignado)' : '' }}
                            {{ $empleadoExists ? '(Empleado ya asignado)' : '' }}
                            {{ $usuarioConId1 ? '(Usuario Admin)' : '' }}
                            {{ $usuarioExists && !$clienteExists && !$proveedorExists && !$empleadoExists && !$usuarioConId1 ? '(Disponible)' : '' }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="puesto" class="form-label">puesto</label>
            <input type="text" name="puesto" class="form-control" id="puesto" value="{{ old('puesto') }}" required>
        </div>
        <div class="mb-3">
            <label for="salario" class="form-label">salario</label>
            <input type="integer" name="salario" class="form-control" id="salario" value="{{ old('salario') }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_contratacion" class="form-label">fecha_contratacion</label>
            <input type="date" name="fecha_contratacion" class="form-control" id="fecha_contratacion" value="{{ old('fecha_contratacion') }}" required>
        </div>

        <button type="submit" class="btn btn-outline-success">Crear Empleado</button>
    </form>
</div>
<a href="{{ route('persona.index') }}" class="btn btn-danger">Volver</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection('content')