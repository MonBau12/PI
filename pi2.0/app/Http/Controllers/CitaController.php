<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Psicologo;
use App\Models\Paciente;

class CitaController extends Controller
{
    // Mostrar formulario para crear una nueva cita
    public function create()
    {
        // Obtener la lista de psicólogos y pacientes disponibles
        $psicologos = Psicologo::all();
        $pacientes = Paciente::all();

        // Pasar los psicólogos y pacientes a la vista
        return view('agendar-cita', compact('psicologos', 'pacientes'));
    }

    // Guardar la nueva cita en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',   // Validar que el paciente exista
            'psicologo_id' => 'required|exists:psicologos,id', // Validar que el psicólogo exista
            'fecha' => 'required|date|after_or_equal:today',   // Validar fecha que no sea anterior a hoy
            'hora' => 'required',                              // Validar hora
        ]);

        // Crear una nueva cita para el paciente seleccionado
        Cita::create([
            'paciente_id' => $request->paciente_id, // ID del paciente
            'psicologo_id' => $request->psicologo_id, // ID del psicólogo
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'estado' => 'Pendiente', // Estado inicial de la cita
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('citas.historial')->with('success', 'Cita solicitada con éxito.');
    }

    // Mostrar el historial de citas del paciente autenticado
    public function historial()
    {
        // Obtener todas las citas del paciente autenticado
        $citas = Cita::where('paciente_id', auth()->id())->get();

        // Obtener solo las citas con estado 'Pendiente' para la lista de citas pendientes
        $citasPendientes = Cita::where('paciente_id', auth()->id())
                               ->where('estado', 'Pendiente')
                               ->get();

        // Obtener las citas no pendientes para el historial
        $citasHistorial = Cita::where('paciente_id', auth()->id())
                              ->where('estado', '!=', 'Pendiente')
                              ->get();

        // Pasar las citas, citas pendientes y citas del historial a la vista
        return view('citas.historial', compact('citas', 'citasPendientes', 'citasHistorial'));
    }

    // Método para cambiar el estado de una cita
    public function cambiarEstado(Request $request, $id)
    {
        // Buscar la cita por su ID
        $cita = Cita::findOrFail($id);

        // Obtener el nuevo estado de la cita desde el formulario
        $nuevoEstado = $request->input('estado');
        $cita->estado = $nuevoEstado;
        $cita->save();

        // Si el estado es distinto a "Pendiente", moverlo al historial
        if ($nuevoEstado != 'Pendiente') {
            return redirect()->route('citas.historial')->with('success', 'Estado de la cita actualizado correctamente.');
        }

        // Si no, redirigir de nuevo a la página de citas pendientes
        return redirect()->route('citas.historial')->with('success', 'Estado de la cita actualizado correctamente.');
    }

    // Método para eliminar una cita
    public function destroy($id)
    {
        // Buscar la cita
        $cita = Cita::find($id);
        
        // Verificar si la cita existe
        if (!$cita) {
            return redirect()->route('citas.historial')->with('error', 'Cita no encontrada.');
        }

        // Eliminar la cita
        $cita->delete();

        // Redirigir al historial con mensaje de éxito
        return redirect()->route('citas.historial')->with('success', 'Cita eliminada con éxito.');
    }
}
