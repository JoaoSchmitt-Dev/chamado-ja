<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChamadoRequest;
use App\Http\Requests\UpdateChamadoRequest;
use App\Http\Resources\ChamadoResource;
use App\Models\Chamado;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\AlterarStatusChamadoRequest;
use App\Http\Resources\HistoricoStatusResource;
use App\Services\AlterarStatusDoChamado;
use DomainException;
use App\Http\Requests\IndexChamadoRequest;

class ChamadoController extends Controller
{
    public function index(
        IndexChamadoRequest $request
    ): AnonymousResourceCollection {
        $dados = $request->validated();

        $consulta = Chamado::query()
            ->with([
                'solicitante',
                'tecnico',
                'categoria',
            ]);

        $consulta
            ->when(
                $dados['status'] ?? null,
                fn($consulta, $status) =>
                $consulta->where('status', $status)
            )
            ->when(
                $dados['prioridade'] ?? null,
                fn($consulta, $prioridade) =>
                $consulta->where('prioridade', $prioridade)
            )
            ->when(
                $dados['categoria_id'] ?? null,
                fn($consulta, $categoriaId) =>
                $consulta->where('categoria_id', $categoriaId)
            )
            ->when(
                $dados['solicitante_id'] ?? null,
                fn($consulta, $solicitanteId) =>
                $consulta->where('solicitante_id', $solicitanteId)
            )
            ->when(
                $dados['data_inicio'] ?? null,
                fn($consulta, $dataInicio) =>
                $consulta->whereDate(
                    'created_at',
                    '>=',
                    $dataInicio
                )
            )
            ->when(
                $dados['data_fim'] ?? null,
                fn($consulta, $dataFim) =>
                $consulta->whereDate(
                    'created_at',
                    '<=',
                    $dataFim
                )
            );

        $ordenacoesPermitidas = [
            'criado_em' => 'created_at',
            'prioridade' => 'prioridade',
            'status' => 'status',
        ];

        $ordenarPor = $dados['ordenar_por'] ?? 'criado_em';

        $colunaOrdenacao =
            $ordenacoesPermitidas[$ordenarPor]
            ?? 'created_at';

        $direcao = $dados['direcao'] ?? 'desc';

        $chamados = $consulta
            ->orderBy($colunaOrdenacao, $direcao)
            ->paginate(15)
            ->withQueryString();

        return ChamadoResource::collection($chamados);
    }

    public function store(StoreChamadoRequest $request): JsonResponse
    {
        $dados = $request->validated();

        $dados['status'] = 'aberto';

        $chamado = Chamado::create($dados);

        $chamado->load([
            'solicitante',
            'tecnico',
            'categoria',
        ]);

        return (new ChamadoResource($chamado))
            ->response()
            ->setStatusCode(201);
    }

    public function show(int $id): ChamadoResource
    {
        $chamado = Chamado::with([
            'solicitante',
            'tecnico',
            'categoria',
            'comentarios',
            'historicoStatus',
        ])->findOrFail($id);

        return new ChamadoResource($chamado);
    }

    public function update(
        UpdateChamadoRequest $request,
        int $id
    ): ChamadoResource {
        $chamado = Chamado::findOrFail($id);

        $chamado->update(
            $request->validated()
        );

        $chamado->load([
            'solicitante',
            'tecnico',
            'categoria',
        ]);

        return new ChamadoResource($chamado);
    }

    public function alterarStatus(AlterarStatusChamadoRequest $request, int $id, AlterarStatusDoChamado $alterarStatus): JsonResponse
    {
        $chamado = Chamado::findOrFail($id);

        $dados = $request->validated();

        try {
            $chamado = $alterarStatus->executar(
                $chamado,
                $dados['status'],
                $dados['usuario_id']
            );
        } catch (DomainException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return (new ChamadoResource($chamado))
            ->response()
            ->setStatusCode(200);
    }

    public function historico(int $id): AnonymousResourceCollection
    {
        $chamado = Chamado::findOrFail($id);

        $historico = $chamado
            ->historicoStatus()
            ->with('usuario')
            ->orderBy('alterado_em')
            ->get();

        return HistoricoStatusResource::collection(
            $historico
        );
    }
}
