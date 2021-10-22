<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablero extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pregunta_user_partida()
    {
        return $this->belongsTo(UserPartida::class, "pregunta_user_partidas_id");
    }

    public function respuesta_user_partida()
    {
        return $this->belongsTo(UserPartida::class, "respuesta_user_partidas_id");
    }
}
