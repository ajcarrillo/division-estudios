<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2019-08-16
 * Time: 10:05
 */

namespace DivisionEstudios\Http\Controllers\Api\v1;


use DB;
use DivisionEstudios\Http\Controllers\Controller;
use DivisionEstudios\Models\Nombramiento;
use Illuminate\Http\Request;

class SinodalesController extends Controller
{
    public function store(Request $request, Nombramiento $nombramiento)
    {
        try {
            DB::transaction(function () use ($request, $nombramiento) {
                $presi         = $request->post('presidente');
                $secretario    = $request->post('secretario');
                $vocal         = $request->post('vocal');
                $vocalSuplente = $request->post('vocalSuplente');

                if ( ! is_null($presi)) {
                    $nombramiento->sinodales()->updateOrCreate(
                        [ 'tipo' => 'PRESIDENTE' ], [ 'maestro_id' => $presi['id'] ]
                    );
                }

                if ( ! is_null($secretario)) {
                    $nombramiento->sinodales()->updateOrCreate(
                        [ 'tipo' => 'SECRETARIO' ], [ 'maestro_id' => $secretario['id'] ]
                    );
                }

                if ( ! is_null($vocal)) {
                    $nombramiento->sinodales()->updateOrCreate(
                        [ 'tipo' => 'VOCAL' ], [ 'maestro_id' => $vocal['id'] ]
                    );
                }

                if ( ! is_null($vocalSuplente)) {
                    $nombramiento->sinodales()->updateOrCreate(
                        [ 'tipo' => 'VOCAL SUPLENTE' ], [ 'maestro_id' => $vocalSuplente['id'] ]
                    );
                }
            });

            return ok([ 'sinodales' => $nombramiento->sinodales()->with('maestro')->get() ]);
        } catch (\Exception $e) {
            return unprocessable_entity([], $e->getMessage());
        } catch (\Throwable $e) {
            return unprocessable_entity([], $e->getMessage());
        }
    }
}
