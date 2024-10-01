@extends('layouts.app')

@section('content')
        <form action="{{ route('formulario.store') }}" method="POST">
            @csrf
            <label for="table">Selecciona una tabla:</label>
            <select id="table" name="table" onchange="mostrarCampos(this.value)">
                <option value="">Seleccionar</option>
                <option value="proveedor">Proveedor</option>
                <option value="despachador">Despachador</option>
            </select>
        
            <!-- Campos para Proveedor -->
            <div id="campos-proveedor" style="display:none;">
                <h3>Datos del Proveedor</h3>
                <label for="id_persona">ID Persona:</label>
                {{-- <input type="number" id="id_persona" name="id_persona" value="{{ old($id_persona) }} /> --}}
                <input name="id_persona" id="id_persona" name="id_persona" value="{{ old('id_persona', $id_persona) }}">
        
                <label for="nit">NIT:</label>
                <input type="number" id="nit" name="nit" />
        
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" maxlength="255" />
            </div>
        
            <!-- Campos para Despachador -->
            <div id="campos-despachador" style="display:none;">
                <h3>Datos del Despachador</h3>
                <label for="turno">Turno:</label>
                <input type="text" id="turno" name="turno" maxlength="255" />
        
                <label for="zona_asignada">Zona Asignada:</label>
                <input type="text" id="zona_asignada" name="zona_asignada" maxlength="255" />
        
                <label for="fecha_contratacion">Fecha de Contratación:</label>
                <input type="date" id="fecha_contratacion" name="fecha_contratacion" />
        
                <label for="estado_despachador">Estado del Despachador:</label>
                <input type="text" id="estado_despachador" name="estado_despachador" maxlength="255" />
        
                <label for="contacto">Contacto:</label>
                <input type="text" id="contacto" name="contacto" maxlength="255" />
            </div>
        
            <button type="submit">Enviar</button>
        </form>
        
    
        <script>
            function mostrarCampos(tipo) {
                // Ocultar todos los campos al inicio
                document.getElementById('campos-proveedor').style.display = 'none';
                document.getElementById('campos-despachador').style.display = 'none';
        
                // Mostrar los campos según el valor seleccionado
                if (tipo === 'proveedor') {
                    document.getElementById('campos-proveedor').style.display = 'block';
                } else if (tipo === 'despachador') {
                    document.getElementById('campos-despachador').style.display = 'block';
                }
            }
        </script>
        
@endsection