<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user_partida');
            $table->foreign("id_user_partida")
                ->references("id")->on("user_partida")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('programador_id');
            $table->integer('modulo_id');
            $table->integer('error_id');
            $table->boolean('tipo_pregunta');
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
        Schema::dropIfExists('preguntas');
    }
}
