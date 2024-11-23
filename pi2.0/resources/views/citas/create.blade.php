@extends('layouts.app')

@section('contenido')
<div class="container mt-5">
    <h1 class="mb-4">Solicitar una Cita</h1>
    <form action="{{ route('citas.store') }}" method="POST">
        @csrf
        
        <!-- Selección de Psicólogo -->
        <div class="mb-3">
            <label for="psicologo_id" class="form-label">Seleccione un psicólogo:</label>
            <select name="psicologo_id" id="psicologo_id" class="form-select" required>
                <option value="" disabled selected>Seleccione un psicólogo</option>
                
                <!-- Verificar si existen psicólogos -->
                @if($psicologos->isEmpty())
                    <option value="" disabled>No hay psicólogos disponibles</option>
                @else
                    @foreach($psicologos as $psicologo)
                        <option value="{{ $psicologo->id }}">{{ $psicologo->nombre_completo }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        
        <!-- Selección de Alumno -->
        <div class="mb-3">
            <label for="alumno_id" class="form-label">Seleccione un alumno:</label>
            <select name="alumno_id" id="alumno_id" class="form-select" required>
                <option value="" disabled selected>Seleccione un alumno</option>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Calendario para seleccionar la fecha -->
        <div class="mb-3">
            <label for="fecha" class="form-label">Seleccione la fecha de la cita:</label>
            <input type="text" id="calendar" class="form-control" placeholder="Selecciona la fecha">
        </div>

        <!-- Selector de hora -->
        <div class="mb-3">
            <label for="hora" class="form-label">Seleccione la hora:</label>
            <input type="time" id="hora" name="hora" class="form-control" required>
        </div>

        <!-- Inputs ocultos para la fecha seleccionada -->
        <input type="hidden" name="fecha" id="fecha" required>

        <button type="submit" class="btn btn-primary mt-4">Solicitar Cita</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.css" rel="stylesheet" />

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Vista inicial: calendario mensual
            selectable: true, // Permitir selección
            dateClick: function(info) { // Evento al seleccionar una fecha
                const selectedDate = info.dateStr;

                // Asignar fecha seleccionada al input oculto
                document.getElementById('fecha').value = selectedDate;
                alert(`Fecha seleccionada: ${selectedDate}`);
            }
        });

        calendar.render();
    });
</script>
@endsection
