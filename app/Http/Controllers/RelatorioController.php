<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\JsonResponse;

class RelatorioController extends Controller
{
    public function resumoChamados(): JsonResponse
    {
        $total = Chamado::count();

        $contagemPorStatus = Chamado::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $porStatus = [
            'aberto' =>
            (int) ($contagemPorStatus['aberto'] ?? 0),

            'em_atendimento' =>
            (int) ($contagemPorStatus['em_atendimento'] ?? 0),

            'aguardando' =>
            (int) ($contagemPorStatus['aguardando'] ?? 0),

            'resolvido' =>
            (int) ($contagemPorStatus['resolvido'] ?? 0),

            'fechado' =>
            (int) ($contagemPorStatus['fechado'] ?? 0),
        ];

        return response()->json([
            'dados' => [
                'total' => $total,
                'por_status' => $porStatus,
            ],
        ]);
    }
}
