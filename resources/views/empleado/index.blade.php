@extends('layouts.app')
@section('content')
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
    });
</script>
@endif

<div class="container mt-5">
    <h1>Lista de empleados</h1>
    <a href="{{ route('empleado.create') }}" class="btn btn-outline-success">crear Empleados</a>
    <table class="table table-bordered table-striped mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>id_persona</th>
                <th>puesto</th>
                <th>salario</th>
                <th>fecha_contratacion</th>
                <th colspan=2>operaciones</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $proveedor)
            @php
                $persona = \App\Models\Persona::find($proveedor->id_persona);
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $persona ? $persona->nombre . ' ' . $persona->apellido : 'Desconocido' }}</td>
                <td>{{ $proveedor->puesto }}</td>
                <td>{{ $proveedor->salario }}</td>
                <td>{{ $proveedor->fecha_contratacion }}</td>
                <td>
                <form action="{{ route('empleado.destroy', $proveedor->id_empleado) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button 
                        
                        type="submit" class="btn btn-outline-danger"
                
                    >
                    eliminar</button>
                    
                </form>
                </td>
                {{-- //<td><a href="{{ route('persona.destroy', $usuario->id_persona) }}" class="btn btn-success">eliminar</a></td> --}}
                {{-- <td>

                    <form action="{{ route('persona.edit', $usuario->id_persona) }}" method="GET">
                        <button 
                        @if(!Auth::check() && (Auth::user()->hasRole('Admin') && Auth::user()->persona_id == $usuario->id_persona) || 
                            (!Auth::user()->hasRole('Admin') && $usuario->id_persona==20))
                            disabled
                        @endif
                        type="submit" class="btn btn-outline-primary">Editar</button>
                    </form>
                </td> --}}

            </tr>
            @endforeach
        </tbody>
    </table>

    @if($empleados->isEmpty())
        <div class="alert alert-info mt-4">
            No hay usuarios registrados.
        </div>
    @endif
</div>
@endsection('content')