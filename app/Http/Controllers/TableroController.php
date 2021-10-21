<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\Tablero;
use App\Models\UserPartida;
use Illuminate\Http\Request;

class TableroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function repartirCartas($partida_id)
    {
        // Se crea la partida, se consultan los jugadores y se obtiene el .json de cartas
        $partida = Partida::find($partida_id);
        $users = $partida->users;
        $cartas = CartasController::obtenerCartas();

        // Se llena el arreglo con las cartas ocultas y se separan de las demás cartas
        $cartasOcultas = array();
        array_push($cartasOcultas, $cartas[$partida["programador_carta_id"]]);
        array_push($cartasOcultas, $cartas[$partida["modulo_carta_id"]]);
        array_push($cartasOcultas, $cartas[$partida["error_carta_id"]]);
        $cartasRestantes = array_diff(array_column($cartas, 'id'), array_column($cartasOcultas, 'id'));

        // $eeeey = array_diff($json["cartas"], $prueba);
        foreach ($users as $user) {
            $userPartida = UserPartida::where("user_nickname", $user["nickname"])->where("partida_id", $partida["id"])->first();
            for ($i = 0; $i < 4; $i++) {
                $cartaSeleccionada = array_rand($cartasRestantes);
                unset($cartasRestantes[$cartaSeleccionada]);
                $tablero = Tablero::create(
                    [
                        "pregunta_user_partidas_id" => $userPartida["id"],
                        "carta_id" => $cartas[$cartaSeleccionada]["id"],
                        "respuesta_user_partidas_id" => $userPartida["id"],
                    ]
                );
            }

            // info("4 CARTAS DE USUARIO:");
            // info($cartasUsuario);

            // $cartasRestantes = array_diff($cartasRestantes, $cartasUsuario);
            // TableroController::repartirCartas($userPartida);
        }
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
