<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Partida;
use App\Models\Pregunta;
use App\Models\Tablero;
use App\Models\Turno;
use App\Models\UserPartida;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Se instancia los factories para migrar los datos a las tablas correspondientes cuando se genere una
        migración a la base de datos
        */
        User::factory(20)->create();
        Partida::factory(1)->create();
        //UserPartida::factory(1)->create();
        // Pregunta::factory(2)->create();
        // Tablero::factory(4)->create();
        // Turno::factory(40)->create();
    }
}
