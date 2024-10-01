@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="text-uppercase">Perfil:</h1>
                <a class="btn btn-primary" href="{{ route('persona.index') }}">Back</a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand text-uppercase" href="#">
            <img src="https://i.pinimg.com/736x/70/58/4b/70584bae6a7eede81742af8dfaa7d0bf.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Bienvenido:  {{ Auth::user()->name }}
          </a>
        </div>
      </nav>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Detalles Personales de la Persona</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Name: </strong>
                {{ $persona->nombre }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Apellido: </strong>
                {{ $persona->apellido }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Fecha nacimiento: </strong>
                {{ $persona->fecha_nacimiento }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Genero: </strong>
                {{ $persona->genero }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Email: </strong>
                {{ $persona->email }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Telefono: </strong>
                {{ $persona->telefono}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Direccion: </strong>
                {{ $persona->direccion }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Estado Civil: </strong>
                {{ $persona->estado_civil }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Nacionalidad: </strong>
                {{ $persona->nacionalidad }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <strong>CI: </strong>
                {{ $persona->numero_identificacion }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Ocupacion: </strong>
                {{ $persona->ocupacion }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <strong>Fecha De Registro: </strong>
                {{ $persona->fecha_registro }}
            </div>
        </div>
    </div>
    <footer class="bg-body-tertiary text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2020 Copyright:
          <a class="text-body" href="https://mdbootstrap.com/">Alex Dev</a>
        </div>
    </footer>
@endsection
