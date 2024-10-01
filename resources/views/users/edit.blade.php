@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Edit User</h2>
                <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Name:</strong></label>
                    <input type="text" name="name" value="{{ $user->name }}" id="name" placeholder="Name"
                        class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email:</strong></label>
                    <input type="text" name="email" value="{{ $user->email }}" id="email" placeholder="Email"
                        class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label"><strong>Password:</strong></label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="confirm-password" class="form-label"><strong>Confirm Password:</strong></label>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password"
                        class="form-control">
                </div>
            </div>
            <div class="row">
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
            
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="persona_id" class="form-label">Persona:</label>
                        <select name="persona_id" id="persona_id" class="form-control">
                            <option value="">Seleccione una persona</option>
                            @foreach($personas as $id_persona => $nombre)
                                @php
                                    $userExists = $users->contains('persona_id', $id_persona);
                                    $isSelected = isset($user) && $user->persona_id == $id_persona; // Verificar si el usuario actual tiene este persona_id
                                @endphp
                                <option value="{{ $id_persona }}" 
                                    {{ $userExists && !$isSelected ? 'disabled' : '' }} 
                                    style="background-color: {{ $userExists && !$isSelected ? '#f8d7da' : '#d4edda' }}; color: {{ $userExists && !$isSelected ? '#721c24' : '#155724' }}"
                                    {{ $isSelected ? 'selected' : '' }}>
                                    {{ $nombre }} {{ $userExists && !$isSelected ? '(Usuario ya asignado)' : '(Disponible)' }}
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