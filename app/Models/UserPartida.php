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

    public function tablero()
    {
        return $this->belongsTo(Tablero::class);
    }
}
