<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\User;
use App\Models\UserPartida;
use Illuminate\Http\Request;

class PartidaController extends Controller
{

    // Función para crear una partida

    public function crearPartida(Request $request)
    {
        $cartas = CartasController::obtenerCartas();
        $cartasOcultas = array();
        //Se buscan las columnas de las cartas que contengan el tipo 1, 2 y 3, para separarlas en variables
        // Luego, se selecciona un array aleatorio de cada tipo y se ingresan en el arreglo de cartas ocultas


        // $programadores = array_keys(array_column($cartas, 'tipo'), 1);
        // array_push($cartasOcultas, $cartas[$programadores[array_rand($programadores)]]);
        // $modulos = array_keys(array_column($cartas, 'tipo'), 2);
        // array_push($cartasOcultas, $cartas[$modulos[array_rand($modulos)]]);
        // $errores = array_keys(array_column($cartas, 'tipo'), 3);
        // array_push($cartasOcultas, $cartas[$errores[array_rand($errores)]]);
        $programadores = array_keys(array_column($cartas, 'tipo'), 1);
        $carta1 = CartasController::obtenerPorIndice(CartasController::obtenerRandom($programadores));
        array_push($cartasOcultas, $carta1);
        $programadores = array_keys(array_column($cartas, 'tipo'), 2);
        $carta2 = CartasController::obtenerPorIndice(CartasController::obtenerRandom($programadores));
        array_push($cartasOcultas, $carta2);
        $programadores = array_keys(array_column($cartas, 'tipo'), 3);
        $carta3 = CartasController::obtenerPorIndice(CartasController::obtenerRandom($programadores));
        array_push($cartasOcultas, $carta3);

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
            // Se registra el jugador1 (Quien creó la partida) en la tabla jugador_partida
            $partida->users()->attach($request->nickname);

            // Aquí se envía el código a la vista
            return response()->json(["msg" => $partida->id]);
        }
    }


    public function unirsePartida(Request $request)
    {
        // Se busca una partida por su id, y se guarda la cantidad de jugadores en una variable.
        $partida = Partida::find($request->partida_id);
        $cantidadJugadores = $partida->users()->count();
        if ($partida->users->contains($request->user_nickname)) {
            // Si la partida contiene el jugador que está ingresando, retorna un mensaje de error, de lo contrario comprueba la cantidad de jugadores
            return response()->json(["allowed" => false, "msg" => "El jugador ya se encuentra en la partida."]);
        } else {
            if ($cantidadJugadores < 4) {
                // Si hay menos de 4 jugadores, registra el nuevo jugador a la partida. de lo contrario, informa que ya hay 4 jugadores.
                $partida->users()->attach($request->user_nickname);
                if ($cantidadJugadores == 3) {
                    // Si la cantidad de jugadores era 3, ahora, se inicia la partida.
                    $this::iniciarPartida($partida);
                }
                // Se retorna el partida id para almacenarla en el local storage del jugador
                return response()->json(["allowed" => true, "msg" => $partida->id]);
            } else {
                return response()->json(["allowed" => false, "msg" => "La partida ya tiene 4 jugadores."]);
            }
        }
    }

    static function iniciarPartida($partida)
    {
        //Se cambia el estado de la partida y se reparten las cartas de esa partida
        $partida->estado = 1;
        $partida->save();
        // En vez de mandar la partida completa, se manda el id, para que los jugadores se actualizen correctamente
        TableroController::repartirCartas($partida["id"]);
    }

    public function listaEspera(Partida $partida)
    {
        if ($partida->users->count() == 4) {
            return response()->json(["start" => true, "users" => $partida->users]);
        } else {
            return response()->json(["start" => false, "users" => $partida->users]);
        }
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
