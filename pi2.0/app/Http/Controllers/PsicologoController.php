<?php

namespace App\Http\Controllers;

use App\Models\Psicologo;
use Illuminate\Http\Request;

class PsicologoController extends Controller
{
    // Método para mostrar todos los psicólogos con paginación
    public function index()
    {
        // Obtener psicólogos con paginación (10 psicólogos por página, ajusta el número según lo que necesites)
        $psicologos = Psicologo::paginate(10);  // Cambia '10' por la cantidad de psicólogos por página que desees mostrar

        // Retornar la vista con los psicólogos paginados
        return view('psicologos.index', compact('psicologos'));
    }

    // Método para mostrar el formulario de creación de un nuevo psicólogo
    public function create()
    {
        return view('psicologos.create');
    }

    // Método para almacenar un nuevo psicólogo
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre_completo' => 'required',
            'edad' => 'required|integer',
            'tipo_contrato' => 'required',
        ]);

        // Crear un nuevo psicólogo en la base de datos
        Psicologo::create([
            'nombre_completo' => $request->nombre_completo,
            'edad' => $request->edad,
            'tipo_contrato' => $request->tipo_contrato,
        ]);

        // Redirigir al listado de psicólogos con un mensaje de éxito
        return redirect()->route('psicologos.index')->with('success', 'Psicólogo agregado con éxito');
    }

    // Método para mostrar el formulario de edición de un psicólogo
    public function edit(Psicologo $psicologo)
    {
        return view('psicologos.edit', compact('psicologo'));
    }

    // Método para actualizar los datos de un psicólogo
    public function update(Request $request, Psicologo $psicologo)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre_completo' => 'required',
            'edad' => 'required|integer',
            'tipo_contrato' => 'required',
        ]);

        // Actualizar los datos del psicólogo
        $psicologo->update([
            'nombre_completo' => $request->nombre_completo,
            'edad' => $request->edad,
            'tipo_contrato' => $request->tipo_contrato,
        ]);

        // Redirigir al listado de psicólogos con un mensaje de éxito
        return redirect()->route('psicologos.index')->with('success', 'Psicólogo actualizado con éxito');
    }

    // Método para eliminar un psicólogo
    public function destroy(Psicologo $psicologo)
    {
        // Eliminar el psicólogo de la base de datos
        $psicologo->delete();

        // Redirigir al listado de psicólogos con un mensaje de éxito
        return redirect()->route('psicologos.index')->with('success', 'Psicólogo eliminado con éxito');
    }
}
