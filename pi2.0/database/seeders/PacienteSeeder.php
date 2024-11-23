<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    public function run()
    {
        Paciente::create([
            'nombre' => 'Ejemplo Paciente',
            'email' => 'ejemplo@correo.com',
            'telefono' => '1234567890',
            'carrera' => 'Ingeniería'
        ]);
    }
}
