<?php

use DivisionEstudios\Http\Controllers\Api\v1\ActaExamenController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\AlumnoController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\AlumnosController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\CarreraController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\DepartamentoController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\HorarioController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\MaestroController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\RemoveUserRoleController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\ResetPasswordController;
use DivisionEstudios\Http\Controllers\Api\v1\Catalogos\UsuariosController;
use DivisionEstudios\Http\Controllers\Api\v1\DocumentoNombramientoController;
use DivisionEstudios\Http\Controllers\Api\v1\JuramentoController;
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

                Route::prefix('/alumnos')
                    ->name('alumnos.')
                    ->group(function () {
                        Route::post('/', [ AlumnosController::class, 'store' ])->name('store');
                        Route::get('/', [ AlumnosController::class, 'index' ])->name('all');
                        Route::get('/por-numero-control', [ AlumnoController::class, 'index' ])->name('index');
                        Route::patch('/{alumno}', [ AlumnosController::class, 'update' ])->name('update');
                    });

                Route::get('/horarios', [ HorarioController::class, 'index' ])->name('horarios.index');

                Route::prefix('/carreras')
                    ->name('carreras.')
                    ->group(function () {
                        Route::post('/', [ CarreraController::class, 'store' ])->name('store');
                        Route::get('/', [ CarreraController::class, 'index' ])->name('index');
                        Route::patch('/{carrera}', [ CarreraController::class, 'update' ])->name('update');
                        Route::delete('/{carrera}', [ CarreraController::class, 'delete' ])->name('delete');
                    });

                Route::prefix('/departamentos')
                    ->name('departamentos.')
                    ->group(function () {
                        Route::post('/', [ DepartamentoController::class, 'store' ])->name('store');
                        Route::get('/', [ DepartamentoController::class, 'index' ])->name('index');
                        Route::patch('/{departamento}', [ DepartamentoController::class, 'update' ])->name('update');
                        Route::delete('/{departamento}', [ DepartamentoController::class, 'delete' ])->name('delete');
                    });

                Route::prefix('/usuarios')
                    ->name('usuarios.')
                    ->group(function () {
                        Route::post('/', [ UsuariosController::class, 'store' ])->name('store');
                        Route::get('/', [ UsuariosController::class, 'index' ])->name('index');
                        Route::patch('/{user}', [ UsuariosController::class, 'update' ])->name('update');
                        Route::patch('/{user}/reset-password', [ ResetPasswordController::class, 'update' ])->name('reset.password');
                        Route::delete('/{user}/role/', [ RemoveUserRoleController::class, 'delete' ])->name('remove.role');
                    });

                Route::prefix('/maestros')
                    ->name('maestros.')
                    ->group(function () {
                        Route::post('/', [ MaestroController::class, 'store' ])->name('store');
                        Route::get('/', [ MaestroController::class, 'index' ])->name('index');
                        Route::patch('/{maestro}', [ MaestroController::class, 'update' ])->name('update');
                        Route::delete('/{maestro}', [ MaestroController::class, 'delete' ])->name('delete');
                    });
            });

        Route::prefix('/nombramientos')
            ->middleware([ 'auth:api' ])
            ->name('nombramientos.')
            ->group(function () {
                Route::post('/', [ NombramientoController::class, 'store' ])->name('store');
                Route::get('/', [ NombramientoController::class, 'index' ])->name('index');
                Route::patch('/{nombramiento}', [ NombramientoController::class, 'update' ])->name('update');

                Route::prefix('/acta')
                    ->name('actas.')
                    ->group(function () {
                        Route::post('/{nombramiento}', [ ActaExamenController::class, 'store' ])->name('store');
                        Route::get('/{nombramiento}', [ ActaExamenController::class, 'download' ])->name('download');
                    });

                Route::post('/{nombramiento}/generar-documento', [ DocumentoNombramientoController::class, 'store' ])->name('generar.documento');

                Route::prefix('/{nombramiento}/juramento')
                    ->name('juramentos.')
                    ->group(function () {
                        Route::post('/', [ JuramentoController::class, 'store' ])->name('store');
                        Route::get('/', [ JuramentoController::class, 'download' ])->name('download');
                    });

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


