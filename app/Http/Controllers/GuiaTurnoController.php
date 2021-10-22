<?php

namespace App\Http\Controllers;

use App\Models\Partida;

class GuiaTurnoController extends Controller
{
    public function informacionTurno(Partida $partida)
    {
        // Se obtiene la partida de entrada, y se llama la guia de turno vinculada a esta, para despues retornar los datos en un response
        $guia = $partida->guia_turno;
        return response()->json(["jugador_pregunta" => $guia["pregunta_user_nickname"], "jugador_respuesta" => $guia["respuesta_user_nickname"]]);
    }
}
