@extends('layouts.app')

@section('contenido')
<div class="container mt-5">
    <h2 class="text-center">Editar Psicólogo</h2>

    <form action="{{ route('psicologos.update', $psicologo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre_completo" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="{{ old('nombre_completo', $psicologo->nombre_completo) }}" required>
        </div>

        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" value="{{ old('edad', $psicologo->edad) }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo_contrato" class="form-label">Tipo de Contrato</label>
            <input type="text" class="form-control" id="tipo_contrato" name="tipo_contrato" value="{{ old('tipo_contrato', $psicologo->tipo_contrato) }}" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Actualizar Psicólogo</button>
            <a href="{{ route('psicologos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
