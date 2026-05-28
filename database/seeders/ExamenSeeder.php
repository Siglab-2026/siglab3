<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('examenes')->insert([

            [
                'nombre' => 'Glucosa en Ayuna',
                'descripcion' => 'Medición de glucosa en sangre',
                'tipo_muestra' => 'Sangre',
                'precio' => 150.00,
                'estado' => 1,
            ],

            [
                'nombre' => 'Creatinina',
                'descripcion' => 'Evaluación de función renal',
                'tipo_muestra' => 'Sangre',
                'precio' => 180.00,
                'estado' => 1,
            ],

            [
                'nombre' => 'Examen General de Orina',
                'descripcion' => 'Análisis general de orina',
                'tipo_muestra' => 'Orina',
                'precio' => 120.00,
                'estado' => 1,
            ],

        ]);
    }
}
