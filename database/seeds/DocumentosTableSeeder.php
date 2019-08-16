<?php

use Illuminate\Database\Seeder;

class DocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentos = [
            'ACTA',
            'JURAMENTO',
            'NOMBRAMIENTO',
            'MEMO SINODALES',
        ];

        foreach ($documentos as $documento) {
            $new = new \DivisionEstudios\Models\Documento(
                [ 'descripcion' => $documento ]
            );

            $new->save();
        }
    }
}
