@extends('layouts.app')

@section('contenido')
<div class="container mt-5">
    <h2 class="text-center">Pacientes</h2>
    
    <!-- Barra de búsqueda -->
    <div class="mb-4">
        <form action="{{ route('pacientes') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar paciente por nombre, correo o grupo" value="{{ request()->get('search') }}">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </form>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 text-end">
        <a href="{{ route('crearpaciente') }}" class="btn btn-primary">Agregar Nuevo Paciente</a>
    </div>

    <!-- Tabla de pacientes -->
    @if($pacientes->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Carrera</th>
                    <th>Grupo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->nombre }}</td>
                        <td>{{ $paciente->email }}</td>
                        <td>{{ $paciente->telefono }}</td>
                        <td>{{ $paciente->carrera }}</td>
                        <td>{{ $paciente->grupo }}</td>
                        <td>
                            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación con estilo más compacto -->
        <div class="d-flex justify-content-center">
            <div class="pagination pagination-sm">
                {{ $pacientes->links() }}
            </div>
        </div>
    @else
        <div class="alert alert-info">
            No se encontraron pacientes que coincidan con los criterios de búsqueda.
        </div>
    @endif
</div>
@endsection
