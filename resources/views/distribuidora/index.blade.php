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

<div class="container mt-2">
    <h1>Lista de Distribuidoras</h1>
    <a href="{{ route('distribuidora.create') }}" class="btn btn-outline-success">crear distribuidora</a>
    <table class="table table-bordered table-striped mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre Proveedor</th>
                <th>nombre distribuidora</th>
                <th>direccion</th>
                <th>telefono</th>
                <th>email</th>
                <th colspan=2>operaciones</th>
            </tr>
        </thead>
        <tbody>
                 @foreach($distribuidoras as $distribuidora)
                    @php
                    // Obtener el proveedor asociado a la distribuidora
                    $proveedor = \App\Models\Proveedor::find($distribuidora->id_proveedor);
                    // Obtener la persona asociada al proveedor
                    $persona = $proveedor ? \App\Models\Persona::find($proveedor->id_persona) : null;
                @endphp
                <tr>
                    <td class="small-column">{{ $loop->iteration }}</td>
                    {{-- <td>{{ $distribuidora->id_proveedor }}</td> --}}
                    <td>{{ $persona ? $persona->nombre . ' ' . $persona->apellido : 'Desconocido' }}</td>
                    <td>{{ $distribuidora->nombre }}</td>
                    <td>{{ $distribuidora->direccion }}</td>
                    <td>{{ $distribuidora->telefono }}</td>
                    <td>{{ $distribuidora->email }}</td>
                </tr>
                <td>
                <form action="{{ route('distribuidora.destroy', $distribuidora->id_distribuidora) }}" method="post">
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

    @if($distribuidoras->isEmpty())
        <div class="alert alert-info mt-2">
            No hay usuarios registrados.
        </div>
    @endif
</div>
@endsection('content')