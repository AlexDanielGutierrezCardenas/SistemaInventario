@extends('layouts.app')

@section('content')
    {{-- <form action="{{ route('formulario.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id_persona" value="{{ $id_persona }}">
        <label for="nombre">Nombre de la Persona: {{ $persona->nombre }}</label> <br>
        <label for="table">Seleccionar Tabla:</label> 
        <select name="table" id="table" onchange="showFields()">
          <option value="administrador">Administrador</option>
          <option value="proveedor">Proveedor</option>
          <option value="solicitante">Solicitante</option>
          <option value="despachador">Despachador</option>
        </select><br>
       <!--solicitante--> 
        <div id="solicitanteFields" style="display: none;">
          <label for="estado">Estado:</label>
          <input type="text" name="estado" id="estado">
        </div>

        <!-- Campos comunes -->
        <label for="id_persona">Identificador:</label>
        <input type="integer" name="id_persona" id="id_persona" value="{{ $id_persona }}" required readonly>
      
        <!-- Campos específicos para 'administrador' -->
        <div id="adminFields" style="display: none;">
          <label for="estado">Estado:</label>
          <input type="text" name="estado" id="estado">
        </div>


        <div id="despachadorFields" style="display: none;">
          <div class="col-md-6">
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
          </div>
        </div>
      
        <!-- Campos específicos para 'proveedor' -->
        <div id="proveedorFields" style="display: none;">
            <div class="mb-3">
              <label for="nit" class="form-label">nit</label>
              <input type="integer" name="nit" class="form-control" id="nit" value="{{ old('nit') }}" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">direccion</label>
                <input type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion') }}" required>
            </div>
        </div>
      
        <!-- Otros campos específicos según la tabla -->
      
        <button type="submit">Guardar</button>
      </form>
      
      <script>
        function showFields() {
          var selectedTable = document.getElementById('table').value;
          
          // Ocultar todos los campos específicos
          document.getElementById('adminFields').style.display = 'none';
          document.getElementById('proveedorFields').style.display = 'none';
          document.getElementById('despachadorFields').style.display = 'none';
          document.getElementById('solicitanteFields').style.display = 'none';
          // Agregar más según las tablas
      
          // Mostrar los campos correspondientes a la tabla seleccionada
          if (selectedTable === 'administrador') {
            document.getElementById('adminFields').style.display = 'block';
          } else if (selectedTable === 'proveedor') {
            document.getElementById('proveedorFields').style.display = 'block';
          }else if (selectedTable === 'despachador') {
            document.getElementById('despachadorFields').style.display = 'block';
          }else if (selectedTable === 'solicitante') {
            document.getElementById('solicitanteFields').style.display = 'block';
          }
          // Repetir para cada tabla
        }
      </script>
       --}}

       <form method="POST" action="{{ route('formulario.store') }}">
        @csrf
        <input type="hidden" name="id_persona" value="{{ old('id_persona', $id_persona) }}">
        <h1>{{$id_persona}}</h1>
        <!-- Selector de tipo -->
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" onchange="toggleFields()" required>
            <option value="">Seleccione el tipo</option>
            <option value="Proveedor">Proveedor</option>
            <option value="despachador">Despachador</option>
        </select>
    
        <!-- Campos específicos para 'proveedor' -->
        <div id="proveedoresFields" style="display: none;">
            <div class="mb-3">
                <label for="nit" class="form-label">NIT</label>
                <input type="number" name="nit" class="form-control" id="nit" value="{{ old('nit') }}" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" class="form-control" id="direccion" value="{{ old('direccion') }}" required>
            </div>
        </div>
    
        <!-- Campos específicos para 'despachador' -->
        <div id="despachadorFields" style="display: none;">
            <div class="mb-3">
                <label for="turno" class="form-label">Turno</label>
                <input type="text" name="turno" class="form-control" id="turno" value="{{ old('turno') }}">
            </div>
            <div class="mb-3">
                <label for="zona_asignada" class="form-label">Zona Asignada</label>
                <input type="text" name="zona_asignada" class="form-control" id="zona_asignada" value="{{ old('zona_asignada') }}">
            </div>
            <div class="mb-3">
                <label for="fecha_contratacion" class="form-label">Fecha de Contratación</label>
                <input type="date" name="fecha_contratacion" class="form-control" id="fecha_contratacion" value="{{ old('fecha_contratacion') }}">
            </div>
            <div class="mb-3">
                <label for="estado_despachador" class="form-label">Estado Despachador</label>
                <input type="text" name="estado_despachador" class="form-control" id="estado_despachador" value="{{ old('estado_despachador') }}">
            </div>
            <div class="mb-3">
                <label for="contacto" class="form-label">Contacto</label>
                <input type="text" name="contacto" class="form-control" id="contacto" value="{{ old('contacto') }}">
            </div>
        </div>
    
        <button type="submit">Enviar</button>
    </form>
    
    <script>
        function toggleFields() {
            var tipo = document.getElementById('tipo').value;
    
            // Mostrar u ocultar los campos según el tipo seleccionado
            document.getElementById('proveedoresFields').style.display = (tipo === 'Proveedor') ? 'block' : 'none';
            document.getElementById('despachadorFields').style.display = (tipo === 'despachador') ? 'block' : 'none';
    
            // Remover o añadir el atributo 'required' en los campos
            toggleRequired('proveedorFields', tipo === 'Proveedor');
            toggleRequired('despachadorFields', tipo === 'despachador');
        }
    
        function toggleRequired(fieldId, isRequired) {
            var fields = document.querySelectorAll('#' + fieldId + ' input');
            fields.forEach(field => {
                field.required = isRequired;
            });
        }
    
        // Asegurarse de ejecutar el script al cargar la página
        document.addEventListener("DOMContentLoaded", function() {
            toggleFields();
        });
    </script>
@endsection