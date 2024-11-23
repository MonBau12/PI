@extends('layouts.app')

@section('contenido')
    <!-- Sección Hero con Imagen de Fondo -->
    <div class="hero" style="background-image: url('{{ asset('images/fondo.jpg') }}'); background-size: cover; background-position: center center; color: white; padding: 5rem 0;">
        <div class="container text-center">

        </div>
    </div>

    <!-- Accesos Directos -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Accesos Rápidos</h2>
        <div class="row">
            <!-- Crear Alumnos -->
            <div class="col-md-4">
                <div class="card shadow-lg border-light mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-person-plus-fill display-4 mb-3 text-primary"></i>
                        <h5 class="card-title">Crear Alumnos</h5>
                        <p class="card-text">Añade nuevos alumnos al sistema para gestionarlos.</p>
                        <a href="{{ route('crearpaciente') }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Crear Psicólogos -->
            <div class="col-md-4">
                <div class="card shadow-lg border-light mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-person-plus-fill display-4 mb-3 text-primary"></i>
                        <h5 class="card-title">Crear Psicólogos</h5>
                        <p class="card-text">Añade psicólogos al sistema para gestionar sus citas.</p>
                        <a href="{{ route('psicologos.create') }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Generar Citas -->
            <div class="col-md-4">
                <div class="card shadow-lg border-light mb-4">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-plus-fill display-4 mb-3 text-primary"></i>
                        <h5 class="card-title">Generar Citas</h5>
                        <p class="card-text">Programa citas para los alumnos y psicólogos.</p>
                        <a href="{{ route('citas.create') }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ver Perfil y Editar Datos Personales -->
    <!-- Esta sección está comentada, puedes descomentarlo cuando sea necesario -->
@endsection
