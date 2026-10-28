<?php

namespace App\Services;

use App\Models\Chamado;
use DomainException;
use Illuminate\Support\Facades\DB;

class AlterarStatusDoChamado
{
    public function executar(
        Chamado $chamado,
        string $novoStatus,
        int $usuarioId
    ): Chamado {
        $transicoesPermitidas = [
            'aberto' => [
                'em_atendimento',
            ],

            'em_atendimento' => [
                'resolvido',
            ],

            'resolvido' => [
                'fechado',
                'em_atendimento',
            ],

            'fechado' => [],
        ];

        $permitidos = $transicoesPermitidas[
            $chamado->status
        ] ?? [];

        if (!in_array($novoStatus, $permitidos, true)) {
            throw new DomainException(
                'Transição de status não permitida.'
            );
        }

        return DB::transaction(function () use (
            $chamado,
            $novoStatus,
            $usuarioId
        ): Chamado {
            $statusAnterior = $chamado->status;

            $chamado->update([
                'status' => $novoStatus,
            ]);

            $chamado->historicoStatus()->create([
                'usuario_id' => $usuarioId,
                'status_anterior' => $statusAnterior,
                'status_novo' => $novoStatus,
            ]);

            return $chamado->refresh();
        });
    }
}