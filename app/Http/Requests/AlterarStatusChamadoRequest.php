<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlterarStatusChamadoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'usuario_id' => [
                'required',
                'integer',
                'exists:usuarios,id',
            ],

            'status' => [
                'required',
                Rule::in([
                    'aberto',
                    'em_atendimento',
                    'aguardando',
                    'resolvido',
                    'fechado',
                ]),
            ],
        ];
    }
}