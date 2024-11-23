<!-- index.psicologo.blade.php -->

@extends('layouts.app')

@section('contenido')
    <!-- Sección Hero -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="text-white">Psicólogos</h1>
            <p class="text-white">Conoce a nuestros psicólogos profesionales</p>
        </div>
    </div>

    <!-- Lista de Psicólogos -->
    <div class="container mt-5">
        <h2 class="text-center">Nuestros Psicólogos</h2>
        <div class="row">
            @foreach ($psicologos as $psicologo)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $psicologo->nombre }}</h5>
                            <p class="card-text">{{ $psicologo->especialidad }}</p>
                            <a href="#" class="btn btn-primary">Ver perfil</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $psicologos->links() }}
        </div>
    </div>
@endsection
