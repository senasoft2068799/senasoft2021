<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user_partida()
    {
        return $this->belongsTo(UserPartida::class);
    }
}
