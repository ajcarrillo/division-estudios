<?php

use Illuminate\Database\Seeder;

class MaestroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maestros = [
            [ 'LICENCIADO EN CONTADURÍA ', 'ROBERT BELTRAN LÓPEZ', '2547456' ],
            [ 'LICENCIADO EN CONTADURÍA', 'MARIO ARTURO SELEM SALINAS', '5098341' ],
            [ 'LICENCIADO EN CONTADURÍA', 'ELÍAS ALFREDO MANZANILLA MADERO', '1757971' ],
            [ 'LICENCIADO EN CONTADURÍA', 'PAMELA ARACELY MEDINA SOSA', '5870926' ],
            [ 'LICENCIADO EN CONTADURÍA', 'ALBA ROSAURA MANZANERO GUTIÉRREZ', '2220461' ],
            [ 'LICENCIADO EN CONTADURÍA', 'CORINA SANTANA DUARTE', '2577980' ],
            [ 'LICENCIADO EN CONTADURÍA', 'DULCE YOLANDA GARRIDO LOPEZ', '1758003' ],
            [ 'CONTADOR PÚBLICO', 'JESÚS DE LEON IBARRA', '279224' ],
            [ 'LICENCIADO EN CONTADURÍA', 'JOSÉ ANTONIO TELLO CIMÉ', '2547459' ],
            [ 'CONTADOR PÚBLICO', 'EYDEN RAUL AZUETA CÁRDENAS', '1173950' ],
            [ 'CONTADOR PÚBLICO', 'GUADALUPE DEL SOCORRO LÓPEZ ARCOS', '2103654' ],
            [ 'LICENCIADO EN CONTADURÍA', 'MARÍA MAGDALENA KU MOTA', '1431231' ],
            [ 'LICENCIADO EN CONTADURÍA', 'ALAN ALBERTO CASTELLANOS OSORIO', '1684578' ],
            [ 'LICENCIADO EN CONTADURÍA', 'ARACELI SÁNCHEZ BRICEÑO', '2439397' ],
            [ 'LICENCIADO EN CONTADURÍA', 'SONIA ESTHER ALEJO HERRERA', '2499197' ],
            [ 'LICENCIADO EN CONTADURÍA', 'OLGA LIBORIA NAVARRO FLORES', '2426784' ],
            [ 'CONTADOR PÚBLICO AUDITOR', 'VICTOR DANIEL CACHON GARCIA DE LA RIVERA', '1372578' ],
            [ 'LICENCIADO EN DERECHO', 'LUIS ALFONSO MARTÍNEZ APARICIO', '1083571' ],
            [ 'LICENCIADO EN CONTADURÍA', 'JESÚS ABRAHAM PERAZA SANTOS', '6238106' ],
            [ 'LICENCIADO EN CONTADURÍA', 'MIGUEL ARROYO MARTÍNEZ', '2455625' ],
            [ 'CONTADOR PÚBLICO Y AUDITOR', 'JOSÉ LUIS CORTÉS SÁNCHEZ', '1389242' ],
            [ 'LICENCIADO EN CONTADURÍA ', 'MARÍA GUADALUPE INZUNZA APODACA', '1605129' ],
            [ 'LICENCIADO EN CONTADURÍA ', 'CHEGUE FELIPE DOMÍNGUEZ TÉ', '2319527' ],
            [ 'LICENCIADO EN DERECHO', 'JOSÉ GUILLERMO TORRES TORRES', '841063' ],
            [ 'CONTADOR PÚBLICO', 'LUIS MIGUEL SÁNCHEZ PÉREZ', '947688' ],
            [ 'LICENCIADO EN BIOLOGÍA ', 'ALEJANDRO MEDINA QUEJ', '1684574' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'HÉCTOR JAVIER ORTÍZ LEÓN', '1699566' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'ALBERTO DE JESÚS NAVARRETE', '951527' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'CARMEN AMELIA VILLEGAS SÁNCHEZ', '3197249' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'CARIBELL YURIDIA LÓPEZ', '1421097' ],
            [ 'INGENIERO EN BIOQUÍMICA', 'SAMUEL ELÍAS ROSADO MARTÍN', '1103649' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'ROSA ÍNES AGUILAR AMAR', '2899444' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'JOSÉ MANUEL CASTRO PÉREZ', '1610692' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'LEOPOLDO QUERUBIN CUTZ POOL', '2840158' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'JOSÉ LUIS MARTINEZ LORENZO', '1336520' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'JORGE ARMANDO LÓPEZ CHAN', '4330095' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'ALICIA CARRILLO BASTOS', '5233759' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'NALLELY ARIADNA AGUILAR CASTRO', '3966317' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'VICTOR NOH BALAM', '3145043' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'MARCO ANTONIO DOMÍNGUEZ GALERA', '2852179' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'GILBERTO RAUL CORTES RODRÍGUEZ', '1610692' ],
            [ 'LICENCIADO EN OCEANOGRAFÍA', 'ELOY FELIPE SOSA CORDERO', '1128154' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'FRANCISCO DURÁN GOROCICA', '7025223' ],
            [ 'MEDICO VETERINARIO ZOOTECNISTA', 'FEDERICO MANUEL SANDOVAL MORENO', '4561765' ],
            [ 'LICENCIATURA EN BIOLOGÍA', 'JOSÉ MANUEL GOMÉZ POOT', '2870157' ],
            [ 'LICENCIADO EN BIOLOGÍA ', 'HEINER DARIO SUÁREZ VÁZQUEZ', '4632265' ],
            [ 'LICENCIADO EN BIOLOGÍA ', 'DAVID GONZÁLEZ SOLÍS', '2212942' ],
            [ 'LICENCIADO EN BIOLOGÍA ', 'JOSÉ HÉCTOR LARA ARENAS', '4604723' ],
            [ 'LICENCIADO EN BIOLOGÍA ', 'JESÚS ANTONIO CHAY CASANOVA', '3401323' ],
            [ 'LICENCIADO EN BIOLOGÍA ', 'PEDRO MIS ÁVILA', '3903181' ],
            [ 'LICENCIADO EN BIOLOGÍA ', 'JOSÉ ROGELIO CEDEÑO VAZQUEZ', '2200316' ],
            [ 'LICENCIADO EN BIOLOGÍA', 'JORGE CORREA SANDOVAL', '1094797' ],
            [ 'INGENIERO INDUSTRIAL EN QUIMICA', 'WILIAM RIVAS RUIZ', '2840176' ],
            [ 'INGENIERO ELECTROMECÁNICO EN PRODUCCIÓN', 'FLORENCIO SOTELO MORENO', '1137103' ],
            [ 'INGENIERO ELECTRICISTA', 'JUAN MANUEL ZAVALA PIMENTEL', '1910507' ],
            [ 'INGENIERO ELÉCTRICO', 'DAVID DE JESÚS SANTILLÁN SANVICENTE', '3701979' ],
            [ 'INGENIERO ELÉCTRICO', 'ALBAN ALEJANDRO ÁVILA LÓPEZ', '4379914' ],
            [ 'INGENIERO EN TRANSMISIONES MILITARES', 'JUAN RAMÓN SONDA MARTÍNEZ', '1301627' ],
            [ 'INGENIERO INDUSTRIAL EN ELÉCTRICA', 'DANIEL CANTÉ GÓNGORA', '2689988' ],
            [ 'INGENIERO ELÉCTRICO', 'LIMBER LEONARDO VELASCO TEH', '4611567' ],
            [ 'INGENIERO INDUSTRIAL EN ELÉCTRICA ', 'JOSÉ HERIBERTO ECHEVERRÍA FLORES', '1551165' ],
            [ 'INGENIERO INDUSTRIAL EN ELÉCTRICA ', 'GERMAN RODRÍGUEZ MAY', '2319105' ],
            [ 'LICENCIADO EN ELECTRÓNICA', 'FRANCO ALEJANDRO ACEVEDO HUERTA', '5402942' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'ZARINA MARYELA BASULTO ÁLVAREZ', '2388754' ],
            [ 'LICENCIADO EN SISTEMAS DE COMPUTACIÓN ADMINISTRATIVAS', 'LAURA YOLANDA HIDALGO SÁNCHEZ', '1509688' ],
            [ 'INGENIERO EN SISTEMAS COMPUTACIONALES', 'MANUEL ABRAHAM ZAPATA ENCALADA', '1949839' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'JORGE  RENÉ FERNÁNDEZ BALDERAS', '3623280' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'RAQUEL IVET SAAVEDRA VARGAS', '7004833' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'LUIS ERNESTO ROSADO CEPEDA', '3229322' ],
            [ 'INGENIERO EN SISTEMAS COMPUTACIONALES', 'MIGUEL ÁNGEL MARTÍNEZ CORDERO', '2735224' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'DOMITILA DE JESÚS POOT NAAL', '3436543' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'AGUSTÍN ESQUIVEL PAT', '3026150' ],
            [ 'INGENIERO EN SISTEMAS COMPUTACIONALES', 'MARÍA DEL ROSARIO LANDA GUZMÁN', '1756370' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'BENJAMÍN VARGAS KU', '3853521' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'LUCY GUADALUPE CÁRDENAS QUIJANO', '3241485' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'LINO RANGEL GÓMEZ', '1776603' ],
            [ 'INGENIERO INDUSTRIAL EN ELECTRICIDAD', 'MIGUEL ÁNGEL DURÁN JACOBO', '2128857' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'ALBERTO MENDOZA OLIVA', '4750328' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'ROGER ISMAEL NOH BALAM', '2191397' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'MARTHA NOEMÍ VELÁZCO TEH', '2092855' ],
            [ 'INGENIERO INDUSTRIAL EN PRODUCCIÓN', 'GABRIEL AYORA PACHO', '1421279' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'DIEGO AURELIO MIAM LÓPEZ', '2085766' ],
            [ 'INGENIERO EN SISTEMAS COMPUTACIONALES', 'CARLOS FLORES PÉREZ', '2966165' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'JULIO ALEJANDRO CARRILLO ALEMÁN', '2318942' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'BLANDY BERENICE PAMPLONA SOLIS', '2389470' ],
            [ 'LICENCIATURA EN INFORMÁTICA', 'CARLOS EDUARDO AZUETA LEÓN', '3026086' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'JUAN CARLOS GARCÍA PANTOJA', '1897967' ],
            [ 'LICENCIADO EN INFORMÁTICA', 'MARÍA DE LOS ÁNGELES NAVARRETE MARNEOU', '2319083' ],
            [ 'INGENIERO CIVIL', 'VICTOR ANTONIO CHULIN TEC', '4723371' ],
            [ 'ARQUITECTO', 'LUIS ENRIQUE MONTUFAR RODRÍGUEZ', '6156081' ],
            [ 'ARQUITECTO', 'JESÚS MARTIN CASTILLO GARCÍA', '2721710' ],
            [ 'ARQUITECTO', 'ARTEMIZA PERERA ESTRELLA', '3853507' ],
            [ 'ARQUITECTO', 'GUILLERMO GÓMEZ ZULETA', '1497969' ],
            [ 'ARQUITECTO', 'SAID MORENO DÍAZ', '1463859' ],
            [ 'ARQUITECTO', 'JUAN CARLOS CURIEL ESPINOSA', '4380895' ],
            [ 'ARQUITECTO', 'MARÍA DOLORES VELAZCO TE', '3107119' ],
            [ 'INGENIERO ARQUITECTO', 'LUIS MANUEL PAZ REQUENA', '640110' ],
            [ 'ARQUITECTO', 'ARLIN EDMUNDO MUÑOZ ANCONA', '2837456' ],
            [ 'ARQUITECTO', 'GABRIELA ROSAS CORREA', '2837406' ],
            [ 'ARQUITECTO', 'RAFAEL ROSAS MONROY', '182391' ],
            [ 'ARQUITECTO', 'JOSÉ RAMÓN ORTIZ GÓMEZ', '3514966' ],
            [ 'ARQUITECTO', 'ENRIQUE ALBERTO ALPUCHE PAJÓN', '557941' ],
            [ 'ARQUITECTO', 'HERLINDA DEL SOCORRO SILVA POOT', '2319109' ],
            [ 'ARQUITECTO', 'MARÍA EVANGELINA ESTRELLA ESTRELLA', '1287876' ],
            [ 'ARQUITECTO', 'JOSÉ LUIS GÓMEZ CARRILLO', '4380780' ],
            [ 'ARQUITECTO', 'MARÍA ELENA SÁNCHEZ GUTIÉRREZ', '7731095' ],
            [ 'ARQUITECTO', 'PEDRO CITLAC CHARGOY LOUSTANAU', '8411504' ],
            [ 'ARQUITECTO', 'LAURA ISABEL GUARNEROS URBINA', '6493283' ],
            [ 'ARQUITECTO', 'JORGE ANTONIO COB', '6493277' ],
            [ 'ARQUITECTO ', 'CARLOS ELIEZER TELLO MOGUEL', '5387044' ],
            [ 'ARQUITECTO', 'DAFFRY ALICIA PUC GÓMEZ', '6493298' ],
            [ 'ARQUITECTO', 'NINIVE MARGELY NAVARRETE CANTO', '1902121' ],
            [ 'INGENIERO CIVIL', 'VÍCTOR ANTONIO CHULIN TEC', '4723371' ],
            [ 'INGENIERO CIVIL  ', 'ARIEL HIPOLITO ZAVALA VARGUEZ', '2852092' ],
            [ 'INGENIERO CIVIL  ', 'MIGUEL ISABEL ESQUIVEL SALAZAR', '2852144' ],
            [ 'INGENIERO CIVIL', 'JOSÉ ANTONIO DOMINGUEZ LEPE', '1551167' ],
            [ 'INGENIERO CIVIL', 'CLAUDIA BEATRIZ RODRÍGUEZ POOT', '5754797' ],
            [ 'INGENIERO CIVIL', 'LUIS FELIPE JIMÉNEZ TORREZ', '1806926' ],
            [ 'INGENIERO CIVIL EN DESARROLLO DE LA COMUNIDAD ', 'JORGE DOMÍNGUEZ URREA', '1756942' ],
            [ 'INGENIERO CIVIL', 'MARTÍN EDUARDO ECHEVERRÍA FLORES', '1300785' ],
            [ 'INGENIERO CIVIL EN DESARROLLO DE LA COMUNIDAD', 'MARCO ANTONIO POOT LIMA', '1218330' ],
            [ 'INGENIERO CIVIL', 'ROBERTO MENA RIVERO', '2427586' ],
            [ 'INGENIERO CIVIL', 'RODRIGO SALAZAR GARCÍA', '2499093' ],
            [ 'INGENIERO CIVIL', 'EDUARDO GONZÁLEZ BUCIO', '1897969' ],
            [ 'INGENIERO CIVIL', 'VÍCTOR MANUEL KU CHUC', '2663814' ],
            [ 'INGENIERO CIVIL', 'MARITZA CHAN JUÁREZ', '5387044' ],
            [ 'INGENIERO CIVIL', 'DAVID GUSTAVO REJÓN PARRA', '4722096' ],
            [ 'INGENIERO CIVIL', 'LUIS ENRIQUE PEÑA ALBA', '1255550' ],
            [ 'INGENIERO CIVIL', 'JACOB EUAN CORREA', '5527789' ],
            [ 'INGENIERO CIVIL', 'GERARDO LAGUNES RODRÍGUEZ', '5189860' ],
            [ 'INGENIERO CIVIL', 'JESÚS ARMANDO GOMEZ PINZÓN', '5387063' ],
            [ 'INGENIERO CIVIL', 'RICARDO ENRIQUE VEGA AZAMAR', '2594004' ],
            [ 'INGENIERO EN SISTEMAS DE ENERGÍA', 'JULIO CÉSAR CRUZ ARGUELLO', '7720251' ],
            [ 'INGENIERO CIVIL', 'ALBERTO YELADAQUI TELLO', '1756648' ],
            [ 'INGENIERO DE MINAS Y METALURGISTA', 'MIGUEL ALBERTO REYES ESCAMILLA', '1671789' ],
            [ 'INGENIERO CIVIL', 'ABRAHAM JESÚS SELEM BUENFIL', '1049246' ],
            [ 'INGENIERO CIVIL', 'FELIPE ÁNGELES PUC HERNÁNDEZ', '1301367' ],
            [ 'INGENIERO CIVIL', 'JORGE ALBERTO QUINTAL HAY', '3264367' ],
            [ 'INGENIERO CIVIL', 'JESÚS ARMANDO GOMEZ PINZÓN', '5387063' ],
            [ 'INGENIERO CIVIL', 'EDGARD DAVID SAAVEDRA LÓPEZ', '4722088' ],
            [ 'INGENIERO CIVIL', 'MOISÉS DANIEL HERNÁNDEZ AKE', '1635573' ],
            [ 'INGENIERO CIVIL', 'TEODORO BEUTELSPACHER GARCÍA', '2091504' ],
            [ 'INGENIERO AMBIENTAL', 'DAVID LÓPEZ FIELDS', '4446004' ],
            [ 'INGENIERO CIVIL', 'SALVADOR FELIPE ESPINET VÁZQUEZ', '7731096' ],
            [ 'INGENIERA EN MATERIALES', 'DANNA LIZETH TREJO ARROYO', '4981379' ],
            [ 'LICENCIADA EN ADMINISTRACIÓN', 'AREMY DEL PILAR BASTO CABRERA', '4722106' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'FRANCISCO JAVIER RIVAS LIZARRAGA', '1470136' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN', 'JOSÉ MANUEL MENESES DOMINGO', '4982460' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'FINY ENITH AGUILAR RIVERO', '2577969' ],
            [ 'LICENCIADO EN PSICOLOGÍA', 'MARÍA DEL SOCORRO TERRAZAS CERVERA', '980418' ],
            [ 'LICENCIADO ADMINISTRACIÓN DE EMPRESAS TURÍSTICAS', 'MARÍA JOSEFINA AGUILAR LEO', '1209532' ],
            [ 'LICENCIADA EN ADMINISTRACION', 'LIZBETH ARAIZ ANGULO TAPIA', '4722115' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'SALVADOR RAMOS TESCUM', '42781' ],
            [ 'LICENCIADO EN EDUCACIÓN', 'MARÍA GUADALUPE DE LOS ANGELES NOVEROLA MUÑOZ', '1058872' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'LUZ MARÍA GONZÁLEZ BARRAGÁN', '1596420' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'JUAN MANUEL CATZIM', '2499072' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN', 'CECILIA LORIA TZAB', '3916545' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'ANASTASIO HERNÁNDEZ CARRILLO', '308669' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'RAQUEL ROCÍO RIVAS RUIZ', '1684321' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'MARÍA DEL PILAR LÓPEZ ARCOS', '1421013' ],
            [ 'LICENCIADO EN DERECHO', 'ESTEBAN MAGAÑA PEREZ', '6484857' ],
            [ 'LICENCIADO EN CIENCIAS DE LA COMUNICACIÓN', 'MARÍA GUADALUPE LARA VERA', '2993831' ],
            [ 'LICENCIADO EN RELACIONES INTERNACIONALES', 'ALVARO RIVERA SANTÍN', '2827893' ],
            [ 'LICENCIADO EN MERCADOTECNIA Y NEGOCIOS INTERNACIONALES', 'ROGELIO YAÑEZ ESPADAS', '5655199' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN', 'LOLY VICTORIA TENORIO RODRÍGUEZ', '5871162' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN', 'LORENZO ALBERTO AGUILAR CALZADA', '4722119' ],
            [ 'LICENCIADO EN SISTEMAS COMERCIALES', 'JOSE PEDRO VILLALOBOS PUGA', '4446015' ],
            [ 'LICENCIADO EN CIENCIAS DE LA COMUNICACIÓN', 'LAURA DEL CARMEN GARRIDO LÓPEZ', '3206002' ],
            [ 'LICENCIADO EN ECONOMÍA Y FINANZAS', 'EUSTACIO DÍAZ RODRÍGUEZ', '3503244' ],
            [ 'LICENCIADO EN PSICOLOGÍA', 'FRANCISCO JAVIER MORENO CUAHTECONTZI', '696763' ],
            [ 'INGENIERO INDUSTRIAL ADMINISTRADOR', 'MARÍA GUADALUPE GONZÁLEZ VALDÉS', '2552742' ],
            [ 'LICENCIADO EN ECONOMÍA', 'J. JESÚS REYES RAMÍREZ', '773318' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS TURÍSTICAS', 'MELISA MENDOZA GIL', '7035305' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN', 'LUCIA MONSERRAT MORENO OLIVA', '5189895' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'RICARDO JOSÉ AGUILAR Y ANGULO', '2305860' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'TOMÁS EFRAÍN MONTERO ZAMUDIO', '1949038' ],
            [ 'LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS', 'CRISTAL MAGALI RIVERO SABIDO', '878937' ],
            [ 'LICENCIADO EN RELACIONES INTERNACIONALES', 'ALVARO RIVERA SANTÍN', '2827893' ],
            [ 'INGENIERO EN GESTIÓN EMPRESARIAL', 'CARLOS ALBERTO MORENO RODRÍGUEZ', '9561793' ],
        ];

        foreach ($maestros as $maestro) {
            $m = new \DivisionEstudios\Models\Maestro([
                'nombre_completo'    => $maestro[1],
                'especialidad'       => $maestro[0],
                'cedula_profesional' => $maestro[2],
            ]);
            $m->save();
        }
    }
}
