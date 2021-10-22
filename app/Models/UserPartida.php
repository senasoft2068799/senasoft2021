<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPartida extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function partida()
    {
        return $this->belongsTo(Partida::class);
    }

    public function tablero_pregunta()
    {
        return $this->hasMany(Tablero::class, "pregunta_user_partidas_id");
    }

    public function tablero_respuesta()
    {
        return $this->hasMany(Tablero::class, "respuesta_user_partidas_id");
    }
}
