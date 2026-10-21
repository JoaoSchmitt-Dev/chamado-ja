<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/saude', function (): JsonResponse {
    return response()->json([
        'dados' => [
            'aplicacao' => 'ChamadoJá',
            'status' => 'funcionando',
        ],
    ]);
});

// Usuários
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);

// Categorias
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);

// Chamados
Route::get('/chamados', [ChamadoController::class, 'index']);
Route::post('/chamados', [ChamadoController::class, 'store']);
Route::get('/chamados/{id}', [ChamadoController::class, 'show']);
Route::patch('/chamados/{id}', [ChamadoController::class, 'update']);