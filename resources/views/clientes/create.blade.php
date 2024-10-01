@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>Crear Clientes Nuevo</h1>

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
        <form action="{{ route('cliente.store') }}" method="POST">
            @csrf  <!-- Protección CSRF -->
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="id_persona" class="form-label">Persona:</label>
                    {{-- <select name="id_persona" id="id_persona" class="form-control">
                        <option value="">Seleccione una persona</option>
                        @foreach($personas as $id_persona => $nombre)
                        @php
                            $clienteExists = $clientes->contains('id_persona', $id_persona);
                            $proveedorExists = $proveedors->contains('id_persona', $id_persona);
                            $empleadoExists = $empleados->contains('id_persona', $id_persona); // Nueva comprobación
                            $usuarioExists = $users->contains('id_persona', $id_persona); // Nueva comprobación
                            $personaAsignada = $clienteExists || $proveedorExists || $empleadoExists || $usuarioExists;
                        @endphp
                        <option value="{{ (int) $id_persona }}" 
                        {{ $personaAsignada ? 'disabled' : '' }} 
                        style="background-color: {{ $personaAsignada ? '#f8d7da' : '#d4edda' }}; color: {{ $personaAsignada ? '#721c24' : '#155724' }}">
                        {{ $nombre }} {{ $personaAsignada ? '(Usuario ya asignado)' : '(Disponible)' }}
                        </option>
                    @endforeach
                    </select> --}}
                    {{-- <select name="id_persona" id="id_persona" class="form-control">
                        <option value="">Seleccione una persona</option> --}}
                        {{-- @foreach($personas as $id_persona => $nombre)
                        @php            
                            $usuarioExists = $users->contains('persona_id', $id_persona);
                            $clienteExists = !$usuarioExists && $clientes->contains('id_persona', $id_persona);
                            $proveedorExists = !$usuarioExists && !$clienteExists && $proveedors->contains('id_persona', $id_persona);
                            $empleadoExists = !$usuarioExists && !$clienteExists && !$proveedorExists && $empleados->contains('id_persona', $id_persona);
                            // Verificar si la persona está en alguna de las tablas (usuario, cliente, proveedor o empleado)
                            // @if ($usuarioExists)
                            //     <h1>La persona {{ $nombre }} es un usuario.</h1>
                            //     <!-- Aquí puedes hacer las demás comparaciones o lógicas necesarias -->
                            // @else
                            //     <h1>La persona {{ $nombre }} no es un usuario, registre primero un usuario.</h1>
                            // @endif
                            $personaAsignada = $usuarioExists || $clienteExists || $proveedorExists || $empleadoExists;
                        @endphp
                        <option value="{{ (int) $id_persona }}" 
                        {{ $personaAsignada ? 'disabled' : '' }} 
                        style="background-color: {{ $personaAsignada ? '#f8d7da' : '#d4edda' }}; color: {{ $personaAsignada ? '#721c24' : '#155724' }}">
                            {{ $nombre }} 
                            <!-- Mostrar qué tipo de persona está asignada -->
                            {{ $usuarioExists ? '(Usuario ya asignado)' : '' }}
                            {{ $clienteExists ? '(Cliente ya asignado)' : '' }}
                            {{ $proveedorExists ? '(Proveedor ya asignado)' : '' }}
                            {{ $empleadoExists ? '(Empleado ya asignado)' : '' }}
                            {{ !$personaAsignada ? '(Disponible)' : '' }}
                        </option>
                        @endforeach --}}´
                        {{-- @foreach($personas as $id_persona => $nombre)
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
                    </select> --}}
                </div>
            </div>
            <div class="mb-3">
                <label for="categoria_cliente" class="form-label">categoria_cliente</label>
                <input type="text" name="categoria_cliente" class="form-control" id="categoria_cliente" value="{{ old('categoria_cliente') }}" required>
            </div>
            <div class="mb-3">
                <label for="fecha_registro" class="form-label">fecha_registro</label>
                <input type="date" name="fecha_registro" class="form-control" id="fecha_registro" value="{{ old('fecha_registro') }}" required>
            </div>

            <button type="submit" class="btn btn-outline-success">Crear client</button>
        </form>
    </div>
    <a href="{{ route('persona.index') }}" class="btn btn-danger">Volver</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
