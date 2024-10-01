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
    <h1>Lista de Provedores</h1>
    <a href="{{ route('proveedor.create') }}" class="btn btn-outline-success">crear proveedor</a>
    <table class="table table-bordered table-striped mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre Proveedor</th>
                <th>nit</th>
                <th>direccion</th>
                <th colspan=2>operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedors as $proveedor)
            @php
                $persona = \App\Models\Persona::find($proveedor->id_persona);
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $persona ? $persona->nombre . ' ' . $persona->apellido : 'Desconocido' }}</td>
                <td>{{ $proveedor->nit }}</td>
                <td>{{ $proveedor->direccion }}</td>
                <td>
                <form action="{{ route('proveedor.destroy', $proveedor->id_proveedor) }}" method="post">
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

    @if($proveedors->isEmpty())
        <div class="alert alert-info mt-4">
            No hay usuarios registrados.
        </div>
    @endif
</div>
@endsection