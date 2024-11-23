@extends('layouts.app')

@section('contenido')
    <!-- Sección Hero -->
    <div class="hero bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4">Tu Perfil</h1>
            <p class="lead">Consulta y edita los datos de tu perfil como administrador.</p>
        </div>
    </div>

    <!-- Información del Perfil -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-lg border-light mb-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">Detalles del Perfil</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nombre:</strong> {{ auth()->user()->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ auth()->user()->email }}</li>
                            <li class="list-group-item"><strong>Rol:</strong> Administrador</li>
                            <!-- Agregar más campos si es necesario -->
                        </ul>
                        <div class="text-center mt-4">
                            <a href="{{ route('editar.datos') }}" class="btn btn-primary">Editar Perfil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
