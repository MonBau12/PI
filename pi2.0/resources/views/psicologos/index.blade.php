@extends('layouts.app')

@section('contenido')
<div class="container mt-5">
    <h2 class="text-center">Psicólogos</h2>
    
    <div class="mb-4 text-end">
        <a href="{{ route('psicologos.create') }}" class="btn btn-primary">Agregar Nuevo Psicólogo</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Edad</th>
                <th>Tipo de Contrato</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($psicologos as $psicologo)
                <tr>
                    <td>{{ $psicologo->id }}</td>
                    <td>{{ $psicologo->nombre_completo }}</td>
                    <td>{{ $psicologo->edad }}</td>
                    <td>{{ $psicologo->tipo_contrato }}</td>
                    <td>
                        <a href="{{ route('psicologos.edit', $psicologo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('psicologos.destroy', $psicologo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $psicologos->links() }} <!-- Paginación -->
</div>
@endsection
