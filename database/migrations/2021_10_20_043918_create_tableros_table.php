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
            $table->unsignedBigInteger("pregunta_user_partidas_id");
            $table->foreign("pregunta_user_partidas_id")
                ->references("id")->on("user_partidas")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer("carta_id");
            $table->unsignedBigInteger("respuesta_user_partidas_id");
            $table->foreign("respuesta_user_partidas_id")
                ->references("id")->on("user_partidas")
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
