<?php

namespace App\Http\Controllers;

use App\Models\Partida;

class GuiaTurnoController extends Controller
{
    public function informacionTurno(Partida $partida)
    {
        // Se obtiene la partida de entrada, y se llama la guia de turno vinculada a esta, para despues retornar los datos en un response
        $guia = $partida->guia_turno;
        return response()->json(["jugador_pregunta" => $guia["pregunta_user_nickname"], "jugador_respuesta" => $guia["respuesta_user_nickname"], "estado_partida" => $partida["estado"]]);
    }
    public static function siguienteTurno(Partida $partida)
    {
        $users = $partida->users;
        $guia = $partida->guia_turno;
        $users_index = array();
        $us0 = $users[0]["nickname"];
        array_push($users_index, $us0);
        $us1 = $users[1]["nickname"];
        array_push($users_index, $us1);
        $us2 = $users[2]["nickname"];
        array_push($users_index, $us2);
        $us3 = $users[3]["nickname"];
        array_push($users_index, $us3);


        $indexUsuarioPregunta = array_keys($users_index, $guia["pregunta_user_nickname"])[0];
        $indexUsuarioRespuesta = array_keys($users_index, $guia["respuesta_user_nickname"])[0];

        if ($indexUsuarioPregunta == 3) {
            $gindexUsuarioPregunta = 0;
        } else {
            $indexUsuarioPregunta++;
        }

        if ($indexUsuarioRespuesta == 3) {
            $indexUsuarioRespuesta = 0;
        } else {
            $indexUsuarioRespuesta++;
        }

        $guia["pregunta_user_nickname"] = $users[$indexUsuarioPregunta]["nickname"];
        $guia["respuesta_user_nickname"] = $users[$indexUsuarioRespuesta]["nickname"];

        $guia->save();
    }
};
