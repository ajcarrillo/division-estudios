<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use DivisionEstudios\Http\Controllers\AppController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/nombramientos')
    ->name('nombramientos.')
    ->middleware('auth')
    ->group(function () {
        Route::prefix('/{nombramientos}/descargar')
            ->name('descargas.')
            ->group(function () {
                Route::get('/memo-sinodales', function ($nombramiento) {
                    return response()->download(storage_path("app/public/nombramientos/{$nombramiento}/memo_sinodales.docx"));
                })->name('memo.sinodales');
                Route::get('/acta', function ($nombramiento) {
                    return response()->download(storage_path("app/public/nombramientos/{$nombramiento}/acta.docx"));
                })->name('acta');
                Route::get('/juramento', function ($nombramiento) {
                    return response()->download(storage_path("app/public/nombramientos/{$nombramiento}/juramento.docx"));
                })->name('juramento');
            });
    });

Route::get('/app/{any?}', [ AppController::class, 'index' ])
    ->where('any', '.*')
    ->middleware([ 'auth' ]);
