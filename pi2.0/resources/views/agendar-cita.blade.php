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
                @foreach($psicologos as $psicologo)
                    <option value="{{ $psicologo->id }}">{{ $psicologo->nombre_completo }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Selección de Paciente -->
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Seleccione un paciente:</label>
            <select name="paciente_id" id="paciente_id" class="form-select" required>
                <option value="" disabled selected>Seleccione un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Calendario para seleccionar la fecha -->
        <div class="mb-3">
            <label for="fecha" class="form-label">Seleccione la fecha de la cita:</label>
            <div id="calendar" class="form-control"></div>
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



<!-- //lol -->