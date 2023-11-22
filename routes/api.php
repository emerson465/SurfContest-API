<?php

use App\Models\Bateria;
use App\Models\Surfista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\OndaController;
use App\Http\Controllers\BateriaController;
use App\Http\Controllers\SurfistaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('onda')->group(function () {
    Route::post('/{ondaId}/criar-nota', [NotaController::class, 'cadastrarNovasNotas']);
});


Route::prefix('bateria')->group(function () {
    Route::apiResource('', BateriaController::class, ['store']);
    Route::get('/{bateriaId}/obter-vencedor', [BateriaController::class, 'obterVencedor']);
    Route::post('/{bateriaId}/cadastrar-ondas', [BateriaController::class, 'cadastrarNovasOndas']);
});

Route::prefix('surfista')->group(function () {
    Route::apiResource('', SurfistaController::class);
});
