
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
        <h1>Lista de Personas</h1>
        <a href="{{ route('persona.create') }}" class="btn btn-outline-success">crear persona</a>
        <table class="table table-bordered table-striped mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha nacimiento</th>
                    <th>genero</th>
                    <th>email</th>
                    {{-- <th>telefono</th>
                    <th>direccion</th>
                    <th>estado civil</th>
                    <th>nacionalidad</th>
                    <th>numero identificacion</th>
                    <th>ocupacion</th>
                    <th>Fecha de Registro</th> --}}
                    <th colspan=2>operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personas as $usuario)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->fecha_nacimiento }}</td>
                    <td>{{ $usuario->genero }}</td>
                    <td>{{ $usuario->email }}</td>
                    {{-- <td>{{ $usuario->telefono }}</td>
                    <td>{{ $usuario->direccion }}</td>
                    <td>{{ $usuario->estado_civil }}</td>
                    <td>{{ $usuario->nacionalidad }}</td>
                    <td>{{ $usuario->numero_identificacion }}</td>
                    <td>{{ $usuario->ocupacion }}</td>
                    <td>{{ $usuario->fecha_registro }}</td> --}}
                    <td>
                    <form action="{{ route('persona.destroy', $usuario->id_persona) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button 
                            {{-- @if(Auth::check() && (Auth::user()->hasRole('Admin') && Auth::user()->persona_id == $usuario->id_persona) || 
                                (!Auth::user()->hasRole('Admin') && $usuario->id_persona==20))
                                disabled
                            @endif --}}
                            type="submit" class="btn btn-outline-danger"
                    
                        >
                        eliminar</button>
                        
                    </form>
                    </td>
                    {{-- //<td><a href="{{ route('persona.destroy', $usuario->id_persona) }}" class="btn btn-success">eliminar</a></td> --}}
                    <td>
                        {{-- <a href="{{ route('persona.edit', $usuario->id_persona) }}"
                        class={{"btn btn-primary btn-sm" ? '': 'disabled-link'}}>Edit</a> --}}
                        <form action="{{ route('persona.edit', $usuario->id_persona) }}" method="GET">
                            <button 
                            {{-- @if(Auth::check() && (Auth::user()->hasRole('Admin') && Auth::user()->persona_id == $usuario->id_persona))
                                disabled
                            @endif --}}
                            {{-- @if(!Auth::check() && (Auth::user()->hasRole('Admin') && Auth::user()->persona_id == $usuario->id_persona) || 
                                (!Auth::user()->hasRole('Admin') && $usuario->id_persona==20))
                                disabled
                            @endif --}}
                            type="submit" class="btn btn-outline-primary">Editar</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        @if($personas->isEmpty())
            <div class="alert alert-info mt-4">
                No hay usuarios registrados.
            </div>
        @endif
    </div>
    
@endsection