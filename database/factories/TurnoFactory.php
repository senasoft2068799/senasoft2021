<?php

namespace Database\Factories;

use App\Models\Turno;
use App\models\User;
use App\models\Partida;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /*
        Se generan datos aleatorios para los campos respectivos de la tabla Turnos a través de php faker
        */
        return [
            'id' => $this->faker->unique()->firstName(),
            'partida_id' => Partida::inRandomOrder()->first()->id,
            'pregunta_user_id' => User::inRandomOrder()->first()->id,
            'respuesta_user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
