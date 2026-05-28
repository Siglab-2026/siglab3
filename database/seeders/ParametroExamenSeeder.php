<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametroExamenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('parametros_examen')->insert([

            // GLUCOSA
            [
                'examen_id' => 1,
                'nombre' => 'Glucosa',
                'unidad_medida' => 'mg/dL',
                'valor_referencia' => '70 - 110',
            ],

            // CREATININA
            [
                'examen_id' => 2,
                'nombre' => 'Creatinina',
                'unidad_medida' => 'mg/dL',
                'valor_referencia' => '0.7 - 1.3',
            ],

            // EXAMEN GENERAL DE ORINA
            [
                'examen_id' => 3,
                'nombre' => 'Color',
                'unidad_medida' => null,
                'valor_referencia' => 'Amarillo',
            ],

            [
                'examen_id' => 3,
                'nombre' => 'Aspecto',
                'unidad_medida' => null,
                'valor_referencia' => 'Transparente',
            ],

            [
                'examen_id' => 3,
                'nombre' => 'pH',
                'unidad_medida' => null,
                'valor_referencia' => '5.0 - 7.0',
            ],

        ]);
    }
}