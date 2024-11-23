@extends('layouts.app')

@section('contenido')
    <!-- Sección Hero -->
    <div class="hero bg-primary text-white py-5">
        <div class="container text-center">
            <h1 class="display-4">Editar Perfil</h1>
            <p class="lead">Modifica tus datos personales y credenciales.</p>
        </div>
    </div>

    <!-- Formulario para Editar Perfil -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-lg border-light mb-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">Editar tus Datos</h5>
                        <form action="{{ route('perfil.actualizar') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Nueva Contraseña (opcional)</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
