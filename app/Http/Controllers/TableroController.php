<?php

namespace App\Http\Controllers;

use App\Http\Resources\TableroResource;
use App\Models\Partida;
use App\Models\Tablero;
use App\Models\UserPartida;
use Illuminate\Http\Request;

class TableroController extends Controller
{
    public static function repartirCartas($partida_id)
    {
        // Se crea la partida, se consultan los jugadores y se obtiene el .json de cartas
        $partida = Partida::find($partida_id);
        $users = $partida->users;
        $cartas = CartasController::obtenerCartas();

        // Se llena el arreglo con las cartas ocultas y se separan de las demás cartas
        $cartasOcultas = array();
        // array_push($cartasOcultas, $cartas[$partida["programador_carta_id"]]);
        // array_push($cartasOcultas, $cartas[$partida["modulo_carta_id"]]);
        // CartasController::ObtenerPorValor($cartas, $partida["error_carta_id"], "id");

        $carta_programador = CartasController::ObtenerPorValor($cartas, $partida["programador_carta_id"], "id");
        array_push($cartasOcultas, $carta_programador);
        $carta_modulo = CartasController::ObtenerPorValor($cartas, $partida["modulo_carta_id"], "id");
        array_push($cartasOcultas, $carta_modulo);
        $carta_error = CartasController::ObtenerPorValor($cartas, $partida["error_carta_id"], "id");
        array_push($cartasOcultas, $carta_error);
        $cartasRestantes = CartasController::cartasDiff($cartas, $cartasOcultas);

        foreach ($users as $user) {
            $userPartida = UserPartida::where("user_nickname", $user["nickname"])->where("partida_id", $partida["id"])->first();
            // for ($i = 0; $i < 4; $i++) {
            //     $cartaSeleccionada = CartasController::obtenerRandom($cartasRestantes);
            //     info($cartaSeleccionada);
            //     unset($cartasRestantes[$cartaSeleccionada]);
            //     // $tablero = Tablero::create(
            //     //     [
            //     //         "pregunta_user_partidas_id" => $userPartida["id"],
            //     //         "carta_id" => $cartas[$cartaSeleccionada]["id"],
            //     //         "respuesta_user_partidas_id" => $userPartida["id"],
            //     //     ]
            //     // );
            // }

            // $userPartida = UserPartida::where("user_nickname", $user["nickname"])->where("partida_id", $partida["id"])->first();
            $cartasUsuario = array();
            for ($i = 0; $i < 4; $i++) {
                $cartaUs = CartasController::obtenerRandom($cartasRestantes);
                array_push($cartasUsuario, $cartaUs);
                $cartasRestantes = CartasController::cartasDiff($cartasRestantes, $cartasUsuario);
                $tablero = Tablero::create(
                    [
                        "pregunta_user_partidas_id" => $userPartida["id"],
                        "carta_id" => $cartaUs["id"],
                        "respuesta_user_partidas_id" => $userPartida["id"],
                    ]
                );
            }
            // TableroController::repartirCartas($userPartida);

            // info("4 CARTAS DE USUARIO:");

            // $cartasRestantes = array_diff($cartasRestantes, $cartasUsuario);
            // TableroController::repartirCartas($userPartida);
        }
    }

    public function obtenerTablero(Request $request)
    {
        info($request);
        $userPartida = UserPartida::where("user_nickname", $request->user_nickname)->where("partida_id", $request->partida_id)->first();
        return TableroResource::collection($userPartida->tablero_pregunta);
        // $partida = Partida::find($request->partida_id);
        // $cantidadJugadores = $partida->users()->count();
        // if ($partida->users->contains($request->user_nickname)) {
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
