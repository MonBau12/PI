<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoToCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            // Usamos un campo 'enum' para definir los valores posibles del estado
            $table->enum('estado', ['Pendiente', 'Asistió', 'No asistió', 'No contestó'])->default('Pendiente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            // Eliminamos la columna 'estado'
            $table->dropColumn('estado');
        });
    }
}
