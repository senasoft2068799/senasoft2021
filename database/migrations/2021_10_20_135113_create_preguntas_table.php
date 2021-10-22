<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_partidas_id');
            $table->foreign("user_partidas_id")
                ->references("id")->on("user_partidas")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('programador_carta_id');
            $table->integer('modulo_carta_id');
            $table->integer('error_carta_id');
            $table->boolean('tipo_pregunta')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
