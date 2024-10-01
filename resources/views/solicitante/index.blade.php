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
    <h1>Lista de Solicitantes</h1>
    <a href="{{ route('solicitante.create') }}" class="btn btn-outline-success">crear proveedor</a>
    <table class="table table-bordered table-striped mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre solicitante</th>
                <th>estado_despachador</th>
                <th>fecha_solicitante</th>
                <th>tiposolicitud</th>
                <th colspan=2>operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitantes as $proveedor)
            @php
                $persona = \App\Models\Persona::find($proveedor->id_persona);
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $persona ? $persona->nombre . ' ' . $persona->apellido : 'Desconocido' }}</td>
                <td>{{ $proveedor->estado_despachador }}</td>
                <td>{{ $proveedor->fecha_solicitante }}</td>
                <td>{{ $proveedor->tiposolicitud }}</td>
                <td>
                <form action="{{ route('proveedor.destroy', $proveedor->id_despachador) }}" method="post">
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

    @if($solicitantes->isEmpty())
        <div class="alert alert-info mt-4">
            No hay usuarios registrados.
        </div>
    @endif
</div>
@endsection