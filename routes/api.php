<?php

use DivisionEstudios\Http\Controllers\Api\v1\ActaExamenController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\MaestroController;
use DivisionEstudios\Http\Controllers\Api\v1\DocumentoNombramientoController;
use DivisionEstudios\Http\Controllers\Api\v1\MemoSinodalesController;
use DivisionEstudios\Http\Controllers\Api\v1\NombramientoController;
use DivisionEstudios\Http\Controllers\Api\v1\SinodalesController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')
    ->name('api.v1.')
    ->group(function () {
        Route::prefix('/catalogos')
            ->name('catalogos.')
            ->group(function () {
                Route::get('/maestros', [ MaestroController::class, 'index' ])->name('maestros.index');
            });

        Route::prefix('/nombramientos')
            ->middleware([ 'auth:api' ])
            ->name('nombramientos.')
            ->group(function () {
                Route::get('/', [ NombramientoController::class, 'index' ])->name('index');

                Route::prefix('/acta')
                    ->name('actas.')
                    ->group(function () {
                        Route::post('/{nombramiento}', [ ActaExamenController::class, 'store' ])->name('store');
                        Route::get('/{nombramiento}', [ ActaExamenController::class, 'download' ])->name('download');
                    });

                Route::post('/{nombramiento}/generar-documento', [ DocumentoNombramientoController::class, 'store' ])->name('generar.documento');

                Route::prefix('/{nombramiento}/sinodales')
                    ->name('sinodales.')
                    ->group(function () {
                        Route::post('/', [ SinodalesController::class, 'store' ])->name('store');
                    });

                Route::prefix('/{nombramiento}/memo-sinodales')
                    ->name('memo.sinodales.')
                    ->group(function () {
                        Route::post('/', [ MemoSinodalesController::class, 'store' ])->name('store');
                    });
            });
    });


