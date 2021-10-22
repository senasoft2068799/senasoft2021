<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\Pregunta;
use App\Models\UserPartida;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function hacerPregunta(Request $request)
    {
        // Se busca el id de jugador partida respectivo
        $userPartida = UserPartida::where("user_nickname", $request->user_nickname)->where("partida_id", $request->partida_id)->first();
        $pregunta = Pregunta::create(
            [
                "user_partidas_id" => $userPartida["id"],
                "programador_carta_id" => $request->carta_programador["id"],
                "modulo_carta_id" => $request->carta_modulo["id"],
                "error_carta_id" => $request->carta_error["id"],
                "tipo_pregunta" => $request->tipo_pregunta
            ]
        );
        // Si la pregunta es 1, se hace a los demás usuarios. De lo contrario, se hace acusación
        if ($pregunta->tipo_pregunta == 1) {
            return PreguntaController::pregunta($pregunta);
        } else {
            return PreguntaController::acusacion($pregunta);
        }
    }
    public static function pregunta($pregunta)
    {
        // GuiaTurnoController::siguienteTurno($partida);
    }

    public static function acusacion($pregunta)
    {
        $up = $pregunta->user_partida;
        $partida = $up->partida;
        info(($partida["programador_carta_id"] == $pregunta["programador_carta_id"]));
        if (($partida["programador_carta_id"] == $pregunta["programador_carta_id"])
            && ($partida["modulo_carta_id"] == $pregunta["modulo_carta_id"])
            && ($partida["error_carta_id"] == $pregunta["error_carta_id"])
        ) {
            $partida["estado"] = 0;
            $partida->save();
            GuiaTurnoController::siguienteTurno($partida);
            return response()->json(["correct" => true, "msg" => "¡Felicidades! Has ganado la partida."]);
        } else {
            GuiaTurnoController::siguienteTurno($partida);
            return response()->json(["correct" => false, "msg" => "¡Error! Esas no son las cartas ocultas..."]);
        }
    }
}
