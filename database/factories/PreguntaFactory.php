<?php

namespace Database\Factories;

use App\Models\Pregunta;
use App\Models\User;
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
        /*
        Se generan datos aleatorios para los campos respectivos de la tabla Preguntas a través de php faker
        */
        return [
            'id_user_partidas' => User::inRandomOrder()->first()->id,
            'programador_id' => $this->faker->unique()->numberBetween(1, 19),
            'modulo_id' => $this->faker->unique()->numberBetween(1, 19),
            'error_id' => $this->faker->unique()->numberBetween(1, 19),
            'tipo_pregunta' => $this->faker->boolean()
        ];
    }
}
