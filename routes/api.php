<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelatorioController;

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
Route::patch('/chamados/{id}/status', [ChamadoController::class, 'alterarStatus']);
Route::get('/chamados/{id}/historico', [ChamadoController::class, 'historico']);
Route::get('/relatorios/resumo-chamados', [RelatorioController::class, 'resumoChamados']);

// Comentarios 
Route::get('/chamados/{id}/comentarios', [ComentarioController::class, 'index']);
Route::post('/chamados/{id}/comentarios', [ComentarioController::class, 'store']);
