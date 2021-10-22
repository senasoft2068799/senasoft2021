<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Partida;
use App\Models\Pregunta;
use App\Models\Tablero;
use App\Models\Turno;
use App\Models\UserPartida;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $user1 = new User();
        $user1->nickname = "diana";
        $user1->password = Hash::make("1234");
        $user1->save();

        $user2 = new User();
        $user2->nickname = "fredy";
        $user2->password = Hash::make("1234");
        $user2->save();

        $user3 = new User();
        $user3->nickname = "jenny";
        $user3->password = Hash::make("1234");
        $user3->save();

        $user4 = new User();
        $user4->nickname = "juanp";
        $user4->password = Hash::make("1234");
        $user4->save();

        $partida = new Partida();
        $partida->id = "ffffff";
        $partida->fecha_inicio = now();
        $partida->programador_carta_id = 4;
        $partida->modulo_carta_id = 10;
        $partida->error_carta_id = 19;
        $partida->estado = 2;
        $partida->save();

        $partida->users()->attach($user1->nickname);
        $partida->users()->attach($user2->nickname);
        $partida->users()->attach($user3->nickname);


        // User::factory(20)->create();
        // Partida::factory(1)->create();
        //UserPartida::factory(1)->create();
        // Pregunta::factory(2)->create();
        // Tablero::factory(4)->create();
        // Turno::factory(40)->create();
    }
}
