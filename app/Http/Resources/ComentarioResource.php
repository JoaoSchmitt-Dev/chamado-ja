<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComentarioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'conteudo' => $this->conteudo,

            'autor' => new UsuarioResource(
                $this->whenLoaded('usuario')
            ),

            'created_at' => $this->created_at,
        ];
    }
}