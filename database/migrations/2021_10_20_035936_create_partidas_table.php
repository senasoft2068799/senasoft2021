<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->string('id', 6)->unique();
            $table->primary('id');
            $table->timestamp("fecha_inicio");
            $table->timestamp("fecha_fin")->nullable();
            $table->integer("programador_carta_id");
            $table->integer("modulo_carta_id");
            $table->integer("error_carta_id");
            $table->unsignedBigInteger('guia_turno_id')->nullable();
            $table->foreign("guia_turno_id")
                ->references("id")->on("guia_turnos");
            $table->tinyInteger("estado")->default(2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidas');
    }
}
