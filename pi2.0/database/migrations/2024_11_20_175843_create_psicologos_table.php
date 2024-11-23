<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsicologosTable extends Migration
{
    public function up()
    {
        Schema::create('psicologos', function (Blueprint $table) {
            $table->id(); // ID del psicólogo
            $table->string('nombre_completo'); // Nombre completo del psicólogo
            $table->integer('edad'); // Edad del psicólogo
            $table->string('tipo_contrato'); // Tipo de contrato (e.g., tiempo completo, tiempo parcial)
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('psicologos'); // Elimina la tabla 'psicologos'
    }
}
