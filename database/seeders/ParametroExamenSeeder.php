<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Examen;
use App\Models\ParametroExamen;

class ParametroExamenSeeder extends Seeder
{
    public function run(): void
    {
        $datos = [

            'Biometría Hemática Completa' => [
                ['nombre' => 'Hemoglobina', 'unidad_medida' => 'g/dL', 'valor_referencia' => '13 - 17'],
                ['nombre' => 'Hematocrito', 'unidad_medida' => '%', 'valor_referencia' => '40 - 50'],
                ['nombre' => 'Leucocitos', 'unidad_medida' => 'x10³/uL', 'valor_referencia' => '4 - 11'],
                ['nombre' => 'Plaquetas', 'unidad_medida' => 'x10³/uL', 'valor_referencia' => '150 - 450'],
            ],

            'Glucosa en Sangre' => [
                ['nombre' => 'Glucosa', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '70 - 110'],
            ],

            'Perfil Lipídico' => [
                ['nombre' => 'Colesterol Total', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0 - 200'],
                ['nombre' => 'Triglicéridos', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0 - 150'],
                ['nombre' => 'HDL', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '40 - 60'],
                ['nombre' => 'LDL', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0 - 130'],
            ],

            'Creatinina Sérica' => [
                ['nombre' => 'Creatinina', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0.7 - 1.3'],
            ],

            'Urea en Sangre' => [
                ['nombre' => 'Urea', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '15 - 45'],
            ],

            'Ácido Úrico' => [
                ['nombre' => 'Ácido Úrico', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '3.5 - 7.2'],
            ],

            'Hemoglobina Glucosilada' => [
                ['nombre' => 'HbA1c', 'unidad_medida' => '%', 'valor_referencia' => '4 - 5.6'],
            ],

            'Perfil Hepático' => [
                ['nombre' => 'TGO / AST', 'unidad_medida' => 'U/L', 'valor_referencia' => '10 - 40'],
                ['nombre' => 'TGP / ALT', 'unidad_medida' => 'U/L', 'valor_referencia' => '7 - 56'],
                ['nombre' => 'Bilirrubina Total', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0.2 - 1.2'],
                ['nombre' => 'Bilirrubina Directa', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0 - 0.3'],
                ['nombre' => 'Bilirrubina Indirecta', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0.2 - 0.9'],
                ['nombre' => 'Fosfatasa Alcalina', 'unidad_medida' => 'U/L', 'valor_referencia' => '44 - 147'],
                ['nombre' => 'Proteínas Totales', 'unidad_medida' => 'g/dL', 'valor_referencia' => '6 - 8.3'],
                ['nombre' => 'Albúmina', 'unidad_medida' => 'g/dL', 'valor_referencia' => '3.5 - 5'],
            ],

            'TGO / AST' => [
                ['nombre' => 'TGO / AST', 'unidad_medida' => 'U/L', 'valor_referencia' => '10 - 40'],
            ],

            'TGP / ALT' => [
                ['nombre' => 'TGP / ALT', 'unidad_medida' => 'U/L', 'valor_referencia' => '7 - 56'],
            ],

            'Bilirrubinas' => [
                ['nombre' => 'Bilirrubina Total', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0.2 - 1.2'],
                ['nombre' => 'Bilirrubina Directa', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0 - 0.3'],
                ['nombre' => 'Bilirrubina Indirecta', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0.2 - 0.9'],
            ],

            'Proteínas Totales y Albúmina' => [
                ['nombre' => 'Proteínas Totales', 'unidad_medida' => 'g/dL', 'valor_referencia' => '6 - 8.3'],
                ['nombre' => 'Albúmina', 'unidad_medida' => 'g/dL', 'valor_referencia' => '3.5 - 5'],
            ],

            'Electrolitos Séricos' => [
                ['nombre' => 'Sodio', 'unidad_medida' => 'mmol/L', 'valor_referencia' => '135 - 145'],
                ['nombre' => 'Potasio', 'unidad_medida' => 'mmol/L', 'valor_referencia' => '3.5 - 5.1'],
                ['nombre' => 'Cloro', 'unidad_medida' => 'mmol/L', 'valor_referencia' => '98 - 107'],
            ],

            'Tiempo de Protrombina' => [
                ['nombre' => 'TP', 'unidad_medida' => 'segundos', 'valor_referencia' => '11 - 13.5'],
                ['nombre' => 'INR', 'unidad_medida' => '', 'valor_referencia' => '0.8 - 1.2'],
            ],

            'Grupo Sanguíneo y Factor RH' => [
                ['nombre' => 'Grupo ABO', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Factor RH', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Prueba Rápida VIH' => [
                ['nombre' => 'Resultado VIH', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

                        // ORINA
            'Examen General de Orina' => [
                ['nombre' => 'Color', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Aspecto', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Densidad', 'unidad_medida' => '', 'valor_referencia' => '1.005 - 1.030'],
                ['nombre' => 'pH', 'unidad_medida' => '', 'valor_referencia' => '5 - 7'],
                ['nombre' => 'Proteínas', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0 - 10'],
                ['nombre' => 'Glucosa', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0 - 15'],
                ['nombre' => 'Cetonas', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Leucocitos', 'unidad_medida' => 'células/campo', 'valor_referencia' => '0 - 5'],
                ['nombre' => 'Eritrocitos', 'unidad_medida' => 'células/campo', 'valor_referencia' => '0 - 3'],
            ],

            'Urocultivo' => [
                ['nombre' => 'Crecimiento bacteriano', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Recuento de colonias', 'unidad_medida' => 'UFC/mL', 'valor_referencia' => '0 - 100000'],
                ['nombre' => 'Antibiograma', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Proteínas en Orina' => [
                ['nombre' => 'Proteínas', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0 - 10'],
            ],

            'Glucosa en Orina' => [
                ['nombre' => 'Glucosa', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '0 - 15'],
            ],

            'Cetonas en Orina' => [
                ['nombre' => 'Cetonas', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Microalbuminuria' => [
                ['nombre' => 'Microalbúmina', 'unidad_medida' => 'mg/L', 'valor_referencia' => '0 - 30'],
            ],

            'Depuración de Creatinina' => [
                ['nombre' => 'Creatinina en Orina', 'unidad_medida' => 'mg/dL', 'valor_referencia' => '20 - 320'],
                ['nombre' => 'Volumen urinario', 'unidad_medida' => 'mL/24h', 'valor_referencia' => '800 - 2000'],
                ['nombre' => 'Depuración de creatinina', 'unidad_medida' => 'mL/min', 'valor_referencia' => '90 - 140'],
            ],

            'Prueba de Embarazo en Orina' => [
                ['nombre' => 'hCG', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Sedimento Urinario' => [
                ['nombre' => 'Leucocitos', 'unidad_medida' => 'células/campo', 'valor_referencia' => '0 - 5'],
                ['nombre' => 'Eritrocitos', 'unidad_medida' => 'células/campo', 'valor_referencia' => '0 - 3'],
                ['nombre' => 'Células epiteliales', 'unidad_medida' => 'células/campo', 'valor_referencia' => '0 - 5'],
                ['nombre' => 'Cristales', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Cilindros', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Drogas en Orina' => [
                ['nombre' => 'Anfetaminas', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Cannabinoides', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Cocaína', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Opiáceos', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            // HECES
            'Examen General de Heces' => [
                ['nombre' => 'Color', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Consistencia', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Moco', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Sangre visible', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'pH', 'unidad_medida' => '', 'valor_referencia' => '6 - 7.5'],
            ],

            'Coproparasitoscópico' => [
                ['nombre' => 'Huevos de parásitos', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Quistes', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Trofozoítos', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Larvas', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Sangre Oculta en Heces' => [
                ['nombre' => 'Sangre oculta', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Coprocultivo' => [
                ['nombre' => 'Crecimiento bacteriano', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Microorganismo aislado', 'unidad_medida' => '', 'valor_referencia' => null],
                ['nombre' => 'Antibiograma', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Rotavirus en Heces' => [
                ['nombre' => 'Antígeno de Rotavirus', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Helicobacter pylori en Heces' => [
                ['nombre' => 'Antígeno H. pylori', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Grasas en Heces' => [
                ['nombre' => 'Grasa fecal', 'unidad_medida' => '', 'valor_referencia' => null],
            ],

            'Leucocitos Fecales' => [
                ['nombre' => 'Leucocitos fecales', 'unidad_medida' => 'células/campo', 'valor_referencia' => '0 - 5'],
            ],

            'pH Fecal' => [
                ['nombre' => 'pH fecal', 'unidad_medida' => '', 'valor_referencia' => '6 - 7.5'],
            ],

            'Azúcares Reductores en Heces' => [
                ['nombre' => 'Azúcares reductores', 'unidad_medida' => '', 'valor_referencia' => null],
            ]
];
                    foreach ($datos as $nombreExamen => $parametros) {
            $examen = Examen::where('nombre', $nombreExamen)->first();

            if (!$examen) {
                continue;
            }

            foreach ($parametros as $parametro) {
                ParametroExamen::updateOrCreate(
                    [
                        'examen_id' => $examen->id,
                        'nombre' => $parametro['nombre'],
                    ],
                    [
                        'unidad_medida' => $parametro['unidad_medida'],
                        'valor_referencia' => $parametro['valor_referencia'],
                       
                    ]
                );
            }
        }
    }
}