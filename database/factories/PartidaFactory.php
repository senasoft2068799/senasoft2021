<?php

namespace Database\Factories;

use App\Models\Partida;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartidaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partida::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /*
        Se generan datos aleatorios para los campos respectivos de la tabla Partidas a través de php faker
        */
        return [
            'fecha_inicio' => now(),
            'fecha_fin' => now(),
            'programador_carta_id' => $this->faker->unique()->numberBetween(1, 19),
            'modulo_carta_id'=> $this->faker->unique()->numberBetween(1, 19),
            'error_carta_id' => $this->faker->unique()->numberBetween(1, 19),
            'estado'=> $this->faker->randomElement([0, 1])
        ];
    }
}
