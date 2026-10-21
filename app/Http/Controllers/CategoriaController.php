<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoriaController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $categorias = Categoria::all();

        return CategoriaResource::collection($categorias);
    }

    public function store(StoreCategoriaRequest $request): JsonResponse
    {
        $categoria = Categoria::create(
            $request->validated()
        );

        return (new CategoriaResource($categoria))
            ->response()
            ->setStatusCode(201);
    }
}