<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexChamadoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => [
                'nullable',
                Rule::in([
                    'aberto',
                    'em_atendimento',
                    'aguardando',
                    'resolvido',
                    'fechado',
                ]),
            ],

            'prioridade' => [
                'nullable',
                Rule::in([
                    'baixa',
                    'media',
                    'alta',
                    'critica',
                ]),
            ],

            'categoria_id' => [
                'nullable',
                'integer',
                'exists:categorias,id',
            ],

            'solicitante_id' => [
                'nullable',
                'integer',
                'exists:usuarios,id',
            ],

            'data_inicio' => [
                'nullable',
                'date',
            ],

            'data_fim' => [
                'nullable',
                'date',
                'after_or_equal:data_inicio',
            ],

            'ordenar_por' => [
                'nullable',
                'string',
            ],

            'direcao' => [
                'nullable',
                Rule::in(['asc', 'desc']),
            ],
        ];
    }
}
