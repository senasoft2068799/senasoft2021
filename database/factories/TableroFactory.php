<?php

namespace Database\Factories;

use App\Models\Tablero;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tablero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->firstName(),
            'pregunta_user_partida_id' => User::inRandomOrder()->first()->id,
            'carta_id' => $this->faker->unique()->numberBetween(1, 19),
            'respuesta_user_partida_id' => User::inRandomOrder()->first()->id
        ];
    }
}
