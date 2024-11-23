<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PsicologoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AlumnoController;


Route::get('citas/create', [CitaController::class, 'create'])->name('citas.create');
Route::post('citas', [CitaController::class, 'store'])->name('citas.store');
Route::get('citas/historial', [CitaController::class, 'historial'])->name('citas.historial');
Route::get('citas/{id}/estado/{estado}', [CitaController::class, 'cambiarEstado'])->name('citas.estado');
Route::delete('citas/{id}', [CitaController::class, 'destroy'])->name('citas.destroy');

// Ruta para la vista de inicio de sesión (login)
Route::get('/', function () {
    return view('login'); // Vista del login
})->name('login');

// Ruta para la página de inicio (dashboard)
Route::get('/inicio', function () {
    return view('inicio'); // Vista del dashboard o página principal
})->name('inicio');

// Rutas para el manejo de pacientes
Route::prefix('pacientes')->group(function () {
    Route::get('/', [PacienteController::class, 'index'])->name('pacientes');
    Route::get('/create', [PacienteController::class, 'create'])->name('crearpaciente');
    Route::post('/', [PacienteController::class, 'store'])->name('pacientes.store');
    Route::get('/{id}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('/{id}', [PacienteController::class, 'update'])->name('pacientes.update');
    Route::delete('/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
});

// Rutas para el manejo de psicólogos
Route::prefix('psicologos')->group(function () {
    Route::get('/', [PsicologoController::class, 'index'])->name('psicologos.index');
    Route::get('/create', [PsicologoController::class, 'create'])->name('psicologos.create');
    Route::post('/', [PsicologoController::class, 'store'])->name('psicologos.store');
    Route::get('/{psicologo}/edit', [PsicologoController::class, 'edit'])->name('psicologos.edit');
    Route::put('/{psicologo}', [PsicologoController::class, 'update'])->name('psicologos.update');
    Route::delete('/{psicologo}', [PsicologoController::class, 'destroy'])->name('psicologos.destroy');
});

// Rutas del alumno
Route::prefix('alumno')->group(function () {
    // Perfil del alumno
    Route::get('/perfil', [AlumnoController::class, 'perfil'])->name('alumno.perfil');
    Route::put('/perfil', [AlumnoController::class, 'updatePerfil'])->name('alumno.updatePerfil');

    // Datos personales del alumno
    Route::get('/datos-personales', [AlumnoController::class, 'datosPersonales'])->name('alumno.datos-personales');
    Route::put('/datos-personales', [AlumnoController::class, 'updateDatosPersonales'])->name('alumno.updateDatosPersonales');

    // Pedir cita
    Route::get('/pedir-cita', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/pedir-cita', [CitaController::class, 'store'])->name('citas.store');

    // Historial de citas
    Route::get('/historial-citas', [CitaController::class, 'historial'])->name('citas.historial');
});

// Rutas para la gestión de citas
Route::prefix('citas')->group(function () {
    Route::get('/crear', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/', [CitaController::class, 'store'])->name('citas.store');
    Route::get('/historial', [CitaController::class, 'historial'])->name('citas.historial');
    
    // Ruta para cambiar el estado de la cita
    Route::post('{id}/estado/{estado}', [CitaController::class, 'cambiarEstado'])->name('citas.cambiarEstado');
    // Ruta para ver el perfil del administrador
Route::get('/perfil', function () {
    return view('perfil');
})->name('ver.perfil')->middleware('auth');
// Ruta para editar los datos del perfil
Route::get('/perfil/editar', function () {
    return view('editar-perfil');
})->name('editar.datos')->middleware('auth');
// Ruta para actualizar los datos del perfil
Route::post('/perfil/actualizar', function (Request $request) {
    $user = auth()->user();
    
    // Validación de datos
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8',
    ]);

    // Actualizar el perfil
    $user->update([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
    ]);

    return redirect()->route('ver.perfil')->with('success', 'Perfil actualizado con éxito.');
})->name('perfil.actualizar')->middleware('auth');

});
