<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlumnoIdToCitasTable extends Migration
{
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->unsignedBigInteger('alumno_id')->nullable(); // Añadir la columna
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade'); // Crear la relación con la tabla alumnos (y eliminar en cascada si el alumno es eliminado)
        });
    }

    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropForeign(['alumno_id']); // Eliminar la clave foránea
            $table->dropColumn('alumno_id'); // Eliminar la columna
        });
    }
}
