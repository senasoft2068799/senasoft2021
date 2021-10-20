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
            $table->unsignedBigInteger('user_partida_id');
            $table->foreign("user_partida_id")
                ->references("id")->on("user_partida")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('programador_carta_id');
            $table->integer('modulo_carta_id');
            $table->integer('error_carta_id');
            $table->boolean('tipo_pregunta')->default(true);
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
