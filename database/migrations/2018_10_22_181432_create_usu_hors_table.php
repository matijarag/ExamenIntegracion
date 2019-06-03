<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuHorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usu_hor', function (Blueprint $table) {
            $table->date('fecha_usu_hor');
            $table->unsignedInteger('id_usu');
            $table->foreign('id_usu')->references('id_usu')->on('users');
            $table->unsignedInteger('id_hordis');
            $table->foreign('id_hordis')->references('id_hor_dis')->on('horarios_disponible');
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
        Schema::dropIfExists('usu_hors');
    }
}
