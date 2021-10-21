<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        // Las cartas se almacenan en un archivo .json debido a que no están sujetas a modificaciones
        // Se obtiene el path del archivo .json que contiene las cartas, y se convierte a array
        $path = public_path() . "/json/cartas.json";
        $cartas = json_decode(file_get_contents($path), true)["cartas"];

        $cartasOcultas = [];
        //Se buscan las columnas de las cartas que contengan el tipo 1, 2 y 3, para separarlas en variables
        // Luego, se selecciona un array aleatorio de cada tipo y se ingresan en el arreglo de cartas ocultas
        $programadores = array_keys(array_column($cartas, 'tipo'), 1);
        array_push($cartasOcultas, $cartas[$programadores[array_rand($programadores)]]);
        $modulos = array_keys(array_column($cartas, 'tipo'), 2);
        array_push($cartasOcultas, $cartas[$modulos[array_rand($modulos)]]);
        $errores = array_keys(array_column($cartas, 'tipo'), 3);
        array_push($cartasOcultas, $cartas[$errores[array_rand($errores)]]);

        // Aquí, se separan las cartas ocultas de las demás cartas almacenandolas en un arreglo
        $cartasRestantes = array_diff(array_column($cartas, 'id'), array_column($cartasOcultas, 'id'));

        // Aquí se genera el código hexadecimal para la partida y se consulta si existe un registro previo con este código
        $codigo = sprintf('%06X', mt_rand(0, 0xFFFFFF));
        // TODO: Validacion de codigo de partida que no exista
        $partida = Partida::where('id', $codigo)->first();
        if (!$partida) {
            //Si la partida con el código generado no existe, se crea una nueva partida haciendo uso de las cartas almacenadas previamente
            $partida = Partida::create(
                [
                    "id" => $codigo,
                    "fecha_inicio" => now(),
                    "programador_carta_id" => $cartasOcultas[0]["id"],
                    "modulo_carta_id" => $cartasOcultas[1]["id"],
                    "error_carta_id" => $cartasOcultas[2]["id"],
                ]
            );
        }
    }

    // $prueba = array_rand($json["cartas"], 3);
    // $eeeey = array_diff($json["cartas"], $prueba);

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function show(Partida $partida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partida $partida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partida $partida)
    {
        //
    }
}
