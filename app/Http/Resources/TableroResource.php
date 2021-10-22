<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TableroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "pregunta_user_partida" => $this->pregunta_user_partida,
            "carta_id" => $this->carta_id,
            "respuesta_user_partida" => $this->respuesta_user_partida,
        ];
    }
}
