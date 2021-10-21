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
        $cartasJson = json_decode(file_get_contents($path), true)["cartas"];
        return $cartasJson;
    }

    public static function obtenerRandom($lstCartas)
    {
        $random = array_rand($lstCartas);
        return $lstCartas[$random];
    }

    public static function obtenerPorValor($lstCartas, $carta_valor, $indice_string)
    {
        $cartasJson = CartasController::obtenerCartas();
        return $cartasJson[array_keys(array_column($lstCartas, $indice_string), $carta_valor)[0]];
    }

    public static function obtenerPorIndice($carta_indice)
    {
        $cartasJson = CartasController::obtenerCartas();
        return $cartasJson[$carta_indice];
    }

    public static function cartasDiff($cartasParaDejar, $cartasParaQuitar)
    {
        $cartasDiferencia = array_diff(array_column($cartasParaDejar, 'id'), array_column($cartasParaQuitar, 'id'));
        $retorno = array();
        foreach ($cartasDiferencia as $carta) {
            $carta = CartasController::obtenerPorValor(CartasController::obtenerCartas(), $carta, "id");
            array_push($retorno, $carta);
        }
        return $retorno;
    }
}
