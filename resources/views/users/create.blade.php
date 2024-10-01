@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Create New User</h2>
                <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong>Something went wrong.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password:</label>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password"
                        class="form-control">
                </div>
            </div>

            <div class="row">
                <!-- Columna para el selector de roles -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="roles" class="form-label">Role:</label>
                        <select name="roles[]" class="form-select">
                            @foreach($roles as $key => $value)
                                <option value="{{ $key }}" 
                                        {{ strtolower($value) == 'admin' ? 'disabled' : '' }} 
                                        style="{{ strtolower($value) == 'admin' ? 'background-color: #f8d7da; color: #721c24;' : '' }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <!-- Columna para el selector de personas -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="persona_id" class="form-label">Persona:</label>
                        <select name="persona_id" id="persona_id" class="form-control">
                            <option value="">Seleccione una persona</option>
                            @foreach($personas as $id_persona => $nombre)
                                @php
                                    $userExists = $users->contains('persona_id', $id_persona);
                                @endphp
                                <option value="{{ $id_persona }}" 
                                    {{ $userExists ? 'disabled' : '' }} 
                                    style="background-color: {{ $userExists ? '#f8d7da' : '#d4edda' }}; color: {{ $userExists ? '#721c24' : '#155724' }}">
                                    {{ $nombre }} {{ $userExists ? '(Usuario ya asignado)' : '(Disponible)' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


@endsection