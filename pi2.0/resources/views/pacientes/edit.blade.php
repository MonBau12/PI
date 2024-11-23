@extends('layouts.app')

@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Paciente</h2>
        
        <!-- Formulario para editar paciente -->
        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $paciente->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $paciente->telefono) }}" required>
            </div>

            <div class="mb-3">
                <label for="carrera" class="form-label">Carrera</label>
                <select class="form-select" id="carrera" name="carrera" required>
                    <option value="Ingeniería en sistemas" {{ $paciente->carrera == 'Ingeniería en sistemas' ? 'selected' : '' }}>Ingeniería en sistemas</option>
                    <option value="Ingeneria en Redes" {{ $paciente->carrera == 'Ingeneria en Redes' ? 'selected' : '' }}>Ingeneria en Redes</option>
                    <option value="Ingeneria en tecnologias Automotriz" {{ $paciente->carrera == 'Ingeneria en tecnologias Automotriz' ? 'selected' : '' }}>Ingeneria en tecnologias Automotriz</option>
                    <option value="Ingeneria en Manufactura" {{ $paciente->carrera == 'Ingeneria en Manufactura' ? 'selected' : '' }}>Ingeneria en Manufactura</option>
                    <option value="Ingeneria en mecatronica" {{ $paciente->carrera == 'Ingeneria en mecatronica' ? 'selected' : '' }}>Ingeneria en mecatronica</option>
                    <option value="Licenciatura en administracion y gestion empresarial" {{ $paciente->carrera == 'Licenciatura en administracion y gestion empresarial' ? 'selected' : '' }}>Licenciatura en administracion y gestion empresarial</option>
                    <option value="Licenciatura en negocios internacionales" {{ $paciente->carrera == 'Licenciatura en negocios internacionales' ? 'selected' : '' }}>Licenciatura en negocios internacionales</option>
                </select>
            </div>

            <!-- Campo grupo bloqueado -->
            <div class="mb-3">
                <label for="grupo" class="form-label">Grupo</label>
                <input type="text" class="form-control" id="grupo" name="grupo" value="{{ old('grupo', $paciente->grupo) }}" readonly>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Actualizar Paciente</button>
                <a href="{{ route('pacientes') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
@endsection
