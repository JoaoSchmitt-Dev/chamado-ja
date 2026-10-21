<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateChamadoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'solicitante_id' => [
                'sometimes',
                'integer',
                'exists:usuarios,id',
            ],

            'tecnico_id' => [
                'sometimes',
                'nullable',
                'integer',
                'exists:usuarios,id',
            ],

            'categoria_id' => [
                'sometimes',
                'integer',
                'exists:categorias,id',
            ],

            'titulo' => [
                'sometimes',
                'string',
                'max:200',
            ],

            'descricao' => [
                'sometimes',
                'string',
                'min:10',
            ],

            'prioridade' => [
                'sometimes',
                Rule::in([
                    'baixa',
                    'media',
                    'alta',
                    'critica',
                ]),
            ],
        ];
    }
}