<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosDisponiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_disponible', function (Blueprint $table) {
            $table->increments('id_hor_dis');
            $table->datetime('fecha_hor_dis');
            $table->string('rut_usuario',12)->default('');
            $table->boolean('disponibilidad')->default(true);
            $table->unsignedInteger('id_estres');
            $table->foreign('id_estres')->references('id_est_res')->on('estado_reserva');
            $table->unsignedInteger('id_mod');
            $table->foreign('id_mod')->references('id_mod')->on('modulo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios_disponibles');
    }
}
