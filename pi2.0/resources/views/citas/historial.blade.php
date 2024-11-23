@extends('layouts.app')

@section('contenido')
<div class="container my-4">
    <h1 class="mb-4">Historial de Citas</h1>

    <!-- Buzón de Citas Pendientes -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-white">
            <h3 class="mb-0">Citas Pendientes</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th>Fecha de la Cita</th>
                        <th>Hora</th>
                        <th>Psicólogo</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citasPendientes as $cita)
                        <tr>
                           
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->psicologo->nombre_completo }}</td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $cita->estado }}</span>
                            </td>
                            <td>
                                <!-- Formulario para cambiar estado de cita -->
                                <form action="{{ route('citas.cambiarEstado', ['id' => $cita->id, 'estado' => old('estado', $cita->estado)]) }}" method="POST" class="d-inline">
                                    @csrf
                                    <div class="form-group">
                                        <label for="estado_{{ $cita->id }}">Cambiar estado:</label>
                                        <select name="estado" id="estado_{{ $cita->id }}" class="form-select">
                                            <option value="Pendiente" {{ $cita->estado === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="Asistió" {{ $cita->estado === 'Asistió' ? 'selected' : '' }}>Asistió</option>
                                            <option value="No asistió" {{ $cita->estado === 'No asistió' ? 'selected' : '' }}>No asistió</option>
                                            <option value="No contestó" {{ $cita->estado === 'No contestó' ? 'selected' : '' }}>No contestó</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Actualizar Estado</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Botón para Generar Cita -->
    <div class="mb-4 text-center">
        <a href="{{ route('citas.create') }}" class="btn btn-success">Generar Cita</a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   <!-- Historial de Citas -->
   <div class="card">
        <div class="card-header bg-info text-white">
            <h3 class="mb-0">Historial de Citas</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Psicólogo</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        <tr>
                
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->psicologo->nombre_completo }}</td>
                            <td>
                                <span class="badge bg-info text-white">{{ $cita->estado }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
