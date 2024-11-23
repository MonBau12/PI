<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPacienteIdToCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->unsignedBigInteger('paciente_id')->nullable()->after('id'); // Agrega la columna paciente_id
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade'); // Define la clave foránea
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
            $table->dropForeign(['paciente_id']); // Elimina la relación foránea
            $table->dropColumn('paciente_id'); // Elimina la columna
        });
    }
}
