<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChamadoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'solicitante_id' => [
                'required',
                'integer',
                'exists:usuarios,id',
            ],

            'categoria_id' => [
                'required',
                'integer',
                'exists:categorias,id',
            ],

            'titulo' => [
                'required',
                'string',
                'max:200',
            ],

            'descricao' => [
                'required',
                'string',
                'min:10',
            ],

            'prioridade' => [
                'required',
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
