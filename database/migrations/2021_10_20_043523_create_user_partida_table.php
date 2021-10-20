<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPartidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_partida', function (Blueprint $table) {
            $table->id();
            $table->string("user_nickname", 20);
            $table->foreign("user_nickname")
                ->references("nickname")->on("users")
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger("partida_id");
            $table->foreign("partida_id")
                ->references("id")->on("partidas")
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
        Schema::dropIfExists('user_partida');
    }
}
