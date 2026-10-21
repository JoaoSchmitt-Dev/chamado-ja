<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChamadoRequest;
use App\Http\Requests\UpdateChamadoRequest;
use App\Http\Resources\ChamadoResource;
use App\Models\Chamado;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChamadoController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $chamados = Chamado::with([
            'solicitante',
            'tecnico',
            'categoria',
        ])->get();

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
}
