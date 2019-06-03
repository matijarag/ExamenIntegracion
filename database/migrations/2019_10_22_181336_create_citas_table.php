<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->increments('id_cit');
            $table->string('observaciones',100)->nullable();
            $table->unsignedInteger('id_hordis');
            $table->foreign('id_hordis')->references('id_hor_dis')->on('horarios_disponible');
            $table->unsignedInteger('id_esci');
            $table->foreign('id_esci')->references('id_est_cit')->on('estado_cita');
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
        Schema::dropIfExists('citas');
    }
}
