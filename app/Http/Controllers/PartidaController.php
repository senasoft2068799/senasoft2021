<?php

namespace App\Http\Controllers;

use App\Models\GuiaTurno;
use App\Models\Partida;
use App\Models\Pregunta;
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
        $request->validate([
            "partida_id" => "required|min:6|max:6|required"
        ]);

        // Se busca una partida por su id, y se guarda la cantidad de jugadores en una variable.
        $partida = Partida::find($request->partida_id);
        $cantidadJugadores = $partida->users()->count();
        if ($partida->users->contains($request->user_nickname)) {
            // Si la partida contiene el jugador que está ingresando, retorna un mensaje de error, de lo contrario comprueba la cantidad de jugadores
            //TODO Comprobar que el jugador este desconectado antes de enviar el response
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
        //Se vincula una guía de turnos llenandola con los turnos iniciales por defecto (Vendría siendo similar a una tabla temporal)
        $guia_turno = new GuiaTurno();
        $guia_turno->pregunta_user_nickname = $partida->users[0]["nickname"];
        $guia_turno->respuesta_user_nickname = $partida->users[1]["nickname"];
        $guia_turno->save();
        // Se vincula la guia de turnos, se cambia el estado de la partida (1: en juego - 2: esperando jugadores)
        $partida->estado = 1;
        $partida->guia_turno()->associate($guia_turno);
        $partida->save();
        // Se reparten las cartas. En vez de mandar la partida completa, se manda el id, para que los jugadores se actualizen correctamente
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

    public function obtenerGanador(Request $request)
    {
        // Se obtiene el registro de la partida actual a través del id
        $partida = Partida::find($request->partida_id);
    }

    public static function comprobarGanador($partida, $cartasLst)
    {
        $cartasOcultas = [$partida->programador_carta_id, $partida->modulo_carta_id, $partida->error_carta_id];
    }
}
