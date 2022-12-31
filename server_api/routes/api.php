<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DiagnosticoController;
use App\Http\Controllers\Api\ProcedimentoController;
use App\Http\Controllers\Api\ProcedimentoGrupoController;
use App\Http\Controllers\Api\TagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('diagnosticos', DiagnosticoController::class);
Route::put('diagnosticos/{diagnostico}/toogleFavorito', [DiagnosticoController::class,'toogleFavorito']);

Route::apiResource('procedimentos', ProcedimentoController::class);
Route::put('procedimentos/{procedimento}/toogleFavorito', [ProcedimentoController::class,'toogleFavorito']);

Route::apiResource('procedimentoGrupos', ProcedimentoGrupoController::class);
Route::apiResource('tags', TagController::class);