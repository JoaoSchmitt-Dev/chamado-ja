<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $usuarios = Usuario::all();

        return UsuarioResource::collection($usuarios);
    }

    public function store(StoreUsuarioRequest $request): JsonResponse
    {
        $dados = $request->validated();

        $dados['senha'] = Hash::make($dados['senha']);

        $usuario = Usuario::create($dados);

        return (new UsuarioResource($usuario))
            ->response()
            ->setStatusCode(201);
    }
}
