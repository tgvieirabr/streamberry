<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmesController;
use App\Http\Controllers\GenerosController;    
use App\Http\Controllers\AvaliacoesController;
use App\Http\Controllers\UsuariosController;   
use App\Http\Controllers\StreamingsController;  
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned to the "api" middleware group. Enjoy building your API!
|
*/

// Rota para usuário autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas CRUD para os recursos
Route::apiResource('filmes', FilmesController::class);
Route::apiResource('generos', GenerosController::class);
Route::apiResource('avaliacoes', AvaliacoesController::class);
Route::apiResource('usuarios', UsuariosController::class);
Route::apiResource('streamings', StreamingsController::class);

// Rota adicional para avaliações em filmes específicos
Route::post('/filmes/{filmeId}/avaliacoes', [AvaliacoesController::class, 'store']);
Route::get('/avaliacoes/{id}', [AvaliacoesController::class, 'show']);
Route::delete('/avaliacoes/{id}', [AvaliacoesController::class, 'destroy']);