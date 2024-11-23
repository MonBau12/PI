<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Mostrar la lista de pacientes paginada
    public function index(Request $request)
    {
        // Obtener el término de búsqueda desde el formulario
        $search = $request->get('search');

        // Filtrar los pacientes si hay un término de búsqueda
        if ($search) {
            $pacientes = Paciente::where('nombre', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('grupo', 'like', '%' . $search . '%')  // Incluir el filtro por grupo
                ->paginate(10);
        } else {
            // Si no hay término de búsqueda, mostrar todos los pacientes
            $pacientes = Paciente::paginate(10);
        }

        // Pasar los pacientes a la vista
        return view('pacientes.index', compact('pacientes'));
    }

    // Mostrar el formulario para agregar un nuevo paciente
    public function create()
    {
        return view('crearpaciente'); // Vista de formulario para crear un nuevo paciente
    }

    // Guardar un nuevo paciente
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|ends_with:@upq.edu.mx|max:255',
            'telefono' => 'required|string|max:15',
            'carrera' => 'required|string|max:255',
            'grupo' => 'nullable|alpha_num|max:10', // Permitir letras y números, máximo 10 caracteres
        ]);

        // Crear el paciente en la base de datos
        Paciente::create($request->only(['nombre', 'email', 'telefono', 'carrera', 'grupo'])); // Añadir 'grupo' al create

        // Redirigir a la vista de pacientes con un mensaje de éxito
        return redirect()->route('pacientes')->with('success', 'Paciente guardado con éxito.');
    }

    // Mostrar el formulario para editar un paciente
    public function edit($id)
    {
        // Buscar el paciente por su ID
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente')); // Vista de edición
    }

    // Actualizar los datos de un paciente
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|ends_with:@upq.edu.mx|max:255',
            'telefono' => 'required|string|max:15',
            'carrera' => 'required|string|max:255',
            'grupo' => 'nullable|alpha_num|max:10', // Permitir letras y números, máximo 10 caracteres
        ]);

        // Buscar el paciente a editar
        $paciente = Paciente::findOrFail($id);
        
        // Actualizar los datos del paciente
        $paciente->update($request->only(['nombre', 'email', 'telefono', 'carrera', 'grupo'])); // Incluir 'grupo' en la actualización

        // Redirigir a la lista de pacientes con un mensaje de éxito
        return redirect()->route('pacientes')->with('success', 'Paciente actualizado con éxito.');
    }

    // Eliminar un paciente
    public function destroy($id)
    {
        // Buscar al paciente a eliminar
        $paciente = Paciente::findOrFail($id);
        
        // Eliminar al paciente
        $paciente->delete();

        // Redirigir a la lista de pacientes con un mensaje de éxito
        return redirect()->route('pacientes')->with('success', 'Paciente eliminado con éxito.');
    }
}
