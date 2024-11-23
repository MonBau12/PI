@extends('layouts.app')

@section('contenido')
<div class="container mt-5">
    <h2 class="text-center">Pacientes</h2>
    
    <div class="mb-4 text-end">
        <a href="{{ route('crearpaciente') }}" class="btn btn-primary">Agregar Nuevo Paciente</a>
    </div>

    <!-- Mensaje de éxito si existe -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla de pacientes -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->nombre }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ $paciente->telefono }}</td>
                    <td>{{ $paciente->carrera }}</td>
                    <td>
                        <!-- Botón de editar -->
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">Editar</a>
                        
                        <!-- Formulario de eliminación -->
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar a este paciente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $pacientes->links() }} <!-- Mostrar enlaces de paginación -->
    </div>
</div>
@endsection
