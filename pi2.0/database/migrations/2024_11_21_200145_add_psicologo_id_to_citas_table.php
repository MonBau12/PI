<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPsicologoIdToCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->unsignedBigInteger('psicologo_id')->nullable()->after('paciente_id'); // Agrega la columna psicologo_id
            $table->foreign('psicologo_id')->references('id')->on('psicologos')->onDelete('cascade'); // Relación con psicologos
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
            $table->dropForeign(['psicologo_id']); // Elimina la relación foránea
            $table->dropColumn('psicologo_id'); // Elimina la columna
        });
    }
}
