<?php

namespace Database\Factories;

use App\Models\UserPartida;
use App\Models\User;
use App\Models\Partida;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPartidaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserPartida::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /*
        Se generan datos aleatorios para los campos respectivos de la tabla UserPartidas a través de php faker
        */
            'user_nickname' => User::inRandomOrder()->first()->nickname,
            'partida_id' => Partida::inRandomOrder()->first()->id
        ];
    }
}
