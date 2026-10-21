<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChamadoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'prioridade' => $this->prioridade,
            'status' => $this->status,

            'solicitante' => new UsuarioResource(
                $this->whenLoaded('solicitante')
            ),

            'tecnico' => new UsuarioResource(
                $this->whenLoaded('tecnico')
            ),

            'categoria' => new CategoriaResource(
                $this->whenLoaded('categoria')
            ),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}