<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_partidas', function (Blueprint $table) {
            $table->id();
            $table->string("user_nickname", 12)->nullable();
            $table->foreign("user_nickname")
                ->references("nickname")->on("users");
            $table->string("partida_id", 6)->nullable();
            $table->foreign("partida_id")
                ->references("id")->on("partidas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_partidas');
    }
}
