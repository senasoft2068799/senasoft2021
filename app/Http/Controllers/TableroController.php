<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\Tablero;
use App\Models\UserPartida;
use Illuminate\Http\Request;

class TableroController extends Controller
{

    public static function obtenerCartas()
    {
        // Las cartas se almacenan en un archivo .json debido a que no están sujetas a modificaciones
        // Se obtiene el path del archivo .json que contiene las cartas, y se convierte a array
        $path = public_path() . "/json/cartas.json";
        $cartas = json_decode(file_get_contents($path), true)["cartas"];
        return $cartas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function repartirCartas($partida_id)
    {
        $partida = Partida::find($partida_id);
        $users = $partida->users;
        $cartas = TableroController::obtenerCartas();

        $cartasOcultas = array();
        array_push($cartasOcultas, $partida["programador_carta_id"]);
        array_push($cartasOcultas, $partida["modulo_carta_id"]);
        array_push($cartasOcultas, $partida["error_carta_id"]);
        info($cartasOcultas);


        $cartasRestantes = array_diff(array_column($cartas, 'id'), array_column($cartasOcultas, 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tablero  $tablero
     * @return \Illuminate\Http\Response
     */
    public function show(Tablero $tablero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tablero  $tablero
     * @return \Illuminate\Http\Response
     */
    public function edit(Tablero $tablero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tablero  $tablero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablero $tablero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tablero  $tablero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tablero $tablero)
    {
        //
    }
}
