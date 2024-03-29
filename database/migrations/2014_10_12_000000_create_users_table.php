<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_usu');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('rut')->nullable();
            $table->boolean('activo')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telefono')->nulleable()->default(null);
            $table->integer('contador')->default(0);
            $table->unsignedInteger('id_tipo_usuario');
            $table->foreign('id_tipo_usuario')->references('id_tip_usu')->on('tipo_usuario');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
