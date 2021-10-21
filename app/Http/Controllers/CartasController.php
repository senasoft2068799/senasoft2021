<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\User;
use App\Models\UserPartida;

class CartasController
{
    public static function obtenerCartas()
    {
        // Las cartas se almacenan en un archivo .json debido a que no están sujetas a modificaciones
        // Se obtiene el path del archivo .json que contiene las cartas, y se convierte a array
        $path = public_path() . "/json/cartas.json";
        $cartas = json_decode(file_get_contents($path), true)["cartas"];
        return $cartas;
    }
}
