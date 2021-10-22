<?php

namespace Database\Factories;

use App\Models\Pregunta;
use App\Models\UserPartida;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreguntaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pregunta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // "id_jugador_partida" => UserPartida::inRandomOrder()->first()->id,
            // "programador_id" => $faker->randomElement(['male', 'female']),
        ];
    }
}
