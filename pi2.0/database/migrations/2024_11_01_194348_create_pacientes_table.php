<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id(); // Crea la columna 'id' auto incrementable
            $table->string('nombre'); // Crea la columna 'nombre'
            $table->string('email')->unique(); // Crea la columna 'email' con restricción única
            $table->string('telefono'); // Crea la columna 'telefono'
            $table->string('carrera'); // Crea la columna 'carrera'
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('pacientes'); // Elimina la tabla 'pacientes' si existe
    }
}
