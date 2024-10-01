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
    <h1>Lista de Clientes</h1>
    {{-- <a href="{{ route('cliente.create') }}" class="btn btn-outline-success">crear cliente</a> --}}
    <table class="table table-bordered table-striped mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>RESPONSABLE</th>
                <th>fecha_registro</th>
                <th>tipo_cliente</th>
                <th colspan=2>operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            {{-- @php
                $persona = \App\Models\Persona::find($cliente->id_persona);
            @endphp --}}
            <tr>
                <td>{{ $loop->iteration }}</td>
                {{-- <td>{{ $persona ? $persona->nombre . ' ' . $persona->apellido : 'Desconocido' }}</td> --}}
                {{-- <td>{{ $cliente->id_despachador }}</td>
                <td>{{ $cliente->id_proveedor }}</td>
                <td>{{ $cliente->id_solicitante }}</td>
                <td>{{ $cliente->id_administrador }}</td>
                <td>{{ $cliente->fecha_registro }}</td>
                <td>{{ $cliente->tipo_cliente }}</td> --}}´
                @if($cliente->id_despachador)
                    <td>{{ $cliente->id_despachador }} :Despachador</td>
                @endif

                @if($cliente->id_proveedor)
                    <td>{{ $cliente->id_proveedor }} :Proveedor</td>
                @endif

                @if($cliente->id_solicitante)
                    <td>{{ $cliente->id_solicitante }} :Solicitante</td>
                @endif

                @if($cliente->id_administrador)
                    <td>{{ $cliente->id_administrador }} :Admin</td>
                @endif

                @if($cliente->fecha_registro)
                    <td>{{ $cliente->fecha_registro }}</td>
                @endif

                @if($cliente->tipo_cliente)
                    <td>{{ $cliente->tipo_cliente }}</td>
                @endif

                <td>
                {{-- <form action="{{ route('cliente.destroy', $cliente->id_cliente) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button  
                        type="submit" class="btn btn-outline-danger"
                    >
                    eliminar</button>
                    
                </form> --}}
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

    @if($clientes->isEmpty())
        <div class="alert alert-info mt-4">
            No hay usuarios registrados.
        </div>
    @endif
</div>
@endsection('content')