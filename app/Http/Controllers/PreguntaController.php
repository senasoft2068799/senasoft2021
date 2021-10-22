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
        $userPartida = UserPartida::where("user_nickname", $request->user_nickname)->where("partida_id", $request->partida_id)->first();
        info($userPartida["id"]);
        info($request->carta_programador["id"]);
        info($request->carta_modulo["id"]);
        info($request->carta_error["id"]);
        info($request->tipo_pregunta);
        $pregunta = Pregunta::create(
            [
                "user_partidas_id" => $userPartida["id"],
                "programador_carta_id" => $request->carta_programador["id"],
                "modulo_carta_id" => $request->carta_modulo["id"],
                "error_carta_id" => $request->carta_error["id"],
                "tipo_pregunta" => $request->tipo_pregunta
            ]
        );
        if ($pregunta->tipo_pregunta == 1) {
            PreguntaController::pregunta($pregunta);
        } else {
            PreguntaController::acusacion($pregunta);
        }
    }
    public static function pregunta($pregunta)
    {
    }

    public static function acusacion($pregunta)
    {
        $pregunta->user_partida;
    }
}
