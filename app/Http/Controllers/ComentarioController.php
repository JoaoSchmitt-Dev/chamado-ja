<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentarioRequest;
use App\Http\Resources\ComentarioResource;
use App\Models\Chamado;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ComentarioController extends Controller
{
    public function index(int $id): AnonymousResourceCollection
    {
        $chamado = Chamado::findOrFail($id);

        $comentarios = $chamado
            ->comentarios()
            ->with('usuario')
            ->orderBy('created_at')
            ->get();

        return ComentarioResource::collection($comentarios);
    }

    public function store(
        StoreComentarioRequest $request,
        int $id
    ): JsonResponse {
        $chamado = Chamado::findOrFail($id);

        $comentario = $chamado
            ->comentarios()
            ->create($request->validated());

        $comentario->load('usuario');

        return (new ComentarioResource($comentario))
            ->response()
            ->setStatusCode(201);
    }
}