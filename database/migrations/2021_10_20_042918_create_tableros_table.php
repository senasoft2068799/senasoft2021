<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tableros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pregunta_jugadore_partida_id")->nullable();
            // $table->foreign("jugadore_partida_id")
            //     ->references("id")->on("jugadore_partida")
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            $table->integer("carta_id");
            $table->unsignedBigInteger("respuesta_jugadore_partida_id")->nullable();
            // $table->foreign("jugadore_partida_id")
            //     ->references("id")->on("jugadore_partida")
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
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
        Schema::dropIfExists('tableros');
    }
}
