<?php

use Illuminate\Database\Seeder;

class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carreras = [
            [ 'descripcion' => 'LICENCIATURA EN ADMINISTRACIÓN', 'grado' => 'LIC.', 'jefe_departamento_id' => 1 ],
            [ 'descripcion' => 'LICENCIATURA EN BIOLOGÍA', 'grado' => 'BIOL.', 'jefe_departamento_id' => 2 ],
            [ 'descripcion' => 'LICENCIATURA EN CONTADURÍA', 'grado' => 'LIC.', 'jefe_departamento_id' => 1 ],
            [ 'descripcion' => 'LICENCIATURA EN INFORMÁTICA', 'grado' => 'LIC.', 'jefe_departamento_id' => 3 ],
            [ 'descripcion' => 'INGENIERÍA EN ADMINISTRACIÓN', 'grado' => 'ING.', 'jefe_departamento_id' => 1 ],
            [ 'descripcion' => 'INGENIERÍA EN GESTIÓN EMPRESARIAL', 'grado' => 'ING.', 'jefe_departamento_id' => 1 ],
            [ 'descripcion' => 'INGENIERÍA CIVIL', 'grado' => 'ING.', 'jefe_departamento_id' => 4 ],
            [ 'descripcion' => 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 'grado' => 'ING.', 'jefe_departamento_id' => 3 ],
            [ 'descripcion' => 'INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES', 'grado' => 'ING.', 'jefe_departamento_id' => 3 ],
            [ 'descripcion' => 'ARQUITECTURA', 'grado' => 'ARQ.', 'jefe_departamento_id' => 4 ],
            [ 'descripcion' => 'CONTADOR PÚBLICO', 'grado' => 'C.P.', 'jefe_departamento_id' => 1 ],
            [ 'descripcion' => 'INGENIERÍA ELÉCTRICA', 'grado' => 'ING', 'jefe_departamento_id' => 5 ],
        ];


        $crs = [
            [ 'id' => 1, 'descripcion' => 'ARQUITECTURA', 'grado' => 'ARQ.' ],
            [ 'id' => 10, 'descripcion' => 'INGENIERÍA EN GESTIÓN EMPRESARIAL', 'grado' => 'ING.' ],
            [ 'id' => 11, 'descripcion' => 'INGENIERIA CIVIL EN DESARROLLO DE LA COMUNIDAD', 'grado' => 'ING.' ],
            [ 'id' => 12, 'descripcion' => 'INGENIERIA INDUSTRIAL EN  ELECTRICA', 'grado' => 'ING.' ],
            [ 'id' => 13, 'descripcion' => 'LICENCIATURA EN ADMINISTRACION DE EMPRESAS TURISTICAS', 'grado' => 'LIC.' ],
            [ 'id' => 14, 'descripcion' => 'LICENCIATURA EN ADMINISTRACION DE EMPRESAS', 'grado' => 'LIC.' ],
            [ 'id' => 15, 'descripcion' => 'INGENIERÍA EN ADMINISTRACIÓN', 'grado' => 'ING.' ],
            [ 'id' => 16, 'descripcion' => 'CONTADOR PÚBLICO', 'grado' => 'C.P.' ],
            [ 'id' => 17, 'descripcion' => 'INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES', 'grado' => 'ING.' ],
            [ 'id' => 18, 'descripcion' => 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 'grado' => 'ING.' ],
            [ 'id' => 19, 'descripcion' => 'INGENIERÍA EN ADMINISTRACIÓN (ABIERTO)', 'grado' => 'ING.' ],
            [ 'id' => 2, 'descripcion' => 'INGENIERÍA CIVIL', 'grado' => 'ING.' ],
            [ 'id' => 20, 'descripcion' => 'CONTADOR PÚBLICO ABIERTO', 'grado' => 'C.P.' ],
            [ 'id' => 21, 'descripcion' => 'ESPECIALIZACION EN ADMINISTRACION DE LA CONSTRUCCION', 'grado' => 'N/A' ],
            [ 'id' => 22, 'descripcion' => 'MAESTRIA EN INGENIERIA-CONSTRUCCION', 'grado' => 'M.I.C.' ],
            [ 'id' => 23, 'descripcion' => 'MAESTRÍA EN CONSTRUCCIÓN', 'grado' => 'M. C' ],
            [ 'id' => 24, 'descripcion' => 'INGENIERÍA EN GESTIÓN EMPRESARIAL ABIERTO', 'grado' => 'ING.' ],
            [ 'id' => 25, 'descripcion' => 'MAESTRÍA EN MANEJO DE ZONA COSTERA', 'grado' => 'M.M.Z.C' ],
            [ 'id' => 3, 'descripcion' => 'INGENIERÍA ELÉCTRICA', 'grado' => 'ING.' ],
            [ 'id' => 4, 'descripcion' => 'LICENCIATURA EN ADMINISTRACIÓN', 'grado' => 'LIC.' ],
            [ 'id' => 5, 'descripcion' => 'LICENCIATURA EN BIOLOGÍA', 'grado' => 'BIOL.' ],
            [ 'id' => 52, 'descripcion' => 'TECNICO EN TURISMO', 'grado' => 'N/A' ],
            [ 'id' => 6, 'descripcion' => 'LICENCIATURA EN CONTADURÍA', 'grado' => 'LIC.' ],
            [ 'id' => 7, 'descripcion' => 'LICENCIATURA EN INFORMÁTICA', 'grado' => 'LIC.' ],
            [ 'id' => 8, 'descripcion' => 'LICENCIATURA EN ADMINISTRACIÓN ABIERTO', 'grado' => 'LIC.' ],
            [ 'id' => 9, 'descripcion' => 'LICENCIATURA EN CONTADURÍA', 'grado' => 'LIC.' ],
        ];

        $modulos = [
            [ 'descripcion' => 'I IMPUESTOS' ],
            [ 'descripcion' => 'II FINANZAS' ],
            [ 'descripcion' => 'III AUDITORIA' ],
            [ 'descripcion' => 'III AUDITORIA' ],
            [ 'descripcion' => 'IV AUDITORIA' ],
            [ 'descripcion' => 'V EGEL' ],
            [ 'descripcion' => 'VI AUDITORIA' ],
            [ 'descripcion' => 'VII IMPUESTOS' ],
            [ 'descripcion' => 'I ACUACULTURA' ],
            [ 'descripcion' => 'II ECOL. MARINA' ],
            [ 'descripcion' => 'III TERRESTRE' ],
            [ 'descripcion' => 'IV EGEL' ],
            [ 'descripcion' => 'I ESTRCUTURAS' ],
            [ 'descripcion' => 'II COSTOS' ],
            [ 'descripcion' => 'III EGEL' ],
            [ 'descripcion' => 'I DISEÑO' ],
            [ 'descripcion' => 'II HISTORIA' ],
            [ 'descripcion' => 'I REDES' ],
            [ 'descripcion' => 'II SISTEMAS DISTRIBUIDOS' ],
            [ 'descripcion' => 'III INGENIERIA DE SOFTWARE' ],
            [ 'descripcion' => 'I ADMINISTRACION' ],
            [ 'descripcion' => 'II PROYECTOS' ],
            [ 'descripcion' => 'III RECUROS HUMANOS' ],
            [ 'descripcion' => 'VI EGEL' ],
            [ 'descripcion' => 'V' ],
            [ 'descripcion' => 'VI' ],
            [ 'descripcion' => 'VII' ],
        ];

        foreach ($crs as $carrera) {
            $c = new \DivisionEstudios\Models\Carrera($carrera);
            $c->save();
        }

        foreach ($modulos as $modulo) {
            $m = new \DivisionEstudios\Models\Modulo($modulo);
            $m->save();
        }

        $admon   = \DivisionEstudios\Models\Carrera::where('descripcion', 'LICENCIATURA EN ADMINISTRACIÓN')->first();
        $modulos = \DivisionEstudios\Models\Modulo::whereIn('descripcion', [
            'I ADMINISTRACION',
            'II PROYECTOS',
            'III RECUROS HUMANOS',
            'VI EGEL',
            'V',
            'VI',
            'VII',
        ])->pluck('id');
        $admon->modulos()->attach($modulos);

        $biolo   = \DivisionEstudios\Models\Carrera::where('descripcion', 'LICENCIATURA EN BIOLOGÍA')->first();
        $modulos = \DivisionEstudios\Models\Modulo::whereIn('descripcion', [
            'I ACUACULTURA',
            'II ECOL. MARINA',
            'III TERRESTRE',
            'IV EGEL',
        ])->pluck('id');
        $biolo->modulos()->attach($modulos);

        $conta   = \DivisionEstudios\Models\Carrera::where('descripcion', 'LICENCIATURA EN CONTADURÍA')->first();
        $modulos = \DivisionEstudios\Models\Modulo::whereIn('descripcion', [
            'I IMPUESTOS',
            'II FINANZAS',
            'III AUDITORIA',
            'III AUDITORIA',
            'IV AUDITORIA',
            'V EGEL',
            'VI AUDITORIA',
            'VII IMPUESTOS',
        ])->pluck('id');
        $conta->modulos()->attach($modulos);

        $info    = \DivisionEstudios\Models\Carrera::where('descripcion', 'LICENCIATURA EN INFORMÁTICA')->first();
        $modulos = \DivisionEstudios\Models\Modulo::whereIn('descripcion', [
            'I REDES',
            'II SISTEMAS DISTRIBUIDOS',
            'III INGENIERIA DE SOFTWARE',
            'IV EGEL',
        ])->pluck('id');
        $info->modulos()->attach($modulos);

        $civil   = \DivisionEstudios\Models\Carrera::where('descripcion', 'INGENIERÍA CIVIL')->first();
        $modulos = \DivisionEstudios\Models\Modulo::whereIn('descripcion', [
            'I ESTRCUTURAS',
            'II COSTOS',
            'III EGEL',
        ])->pluck('id');
        $civil->modulos()->attach($modulos);

        $arq     = \DivisionEstudios\Models\Carrera::where('descripcion', 'ARQUITECTURA')->first();
        $modulos = \DivisionEstudios\Models\Modulo::whereIn('descripcion', [
            'I DISEÑO',
            'II HISTORIA',
            'III EGEL',
        ])->pluck('id');
        $arq->modulos()->attach($modulos);
    }
}
