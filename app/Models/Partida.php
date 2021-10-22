<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';

    public function users()
    {
        return $this->belongsToMany(User::class, "user_partidas");;
    }

    public function guia_turno()
    {
        return $this->belongsTo(GuiaTurno::class);
    }
}
