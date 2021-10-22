<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->string("partida_id", 6);
            $table->foreign("partida_id")
                ->references("id")->on("partidas")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->tinyInteger("pregunta_user_id")->default(1);
            $table->tinyInteger("respuesta_user_id")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
}
