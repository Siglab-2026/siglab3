<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Examen;

class ExamenSeeder extends Seeder
{
    public function run(): void
    {
        $examenes = [

            // SANGRE
            ['nombre' => 'Biometría Hemática Completa', 'descripcion' => 'Evaluación general de células sanguíneas.', 'tipo_muestra' => 'Sangre', 'precio' => 350, 'estado' => 1],
            ['nombre' => 'Glucosa en Sangre', 'descripcion' => 'Medición de glucosa sérica.', 'tipo_muestra' => 'Sangre', 'precio' => 180, 'estado' => 1],
            ['nombre' => 'Perfil Lipídico', 'descripcion' => 'Evaluación de colesterol y triglicéridos.', 'tipo_muestra' => 'Sangre', 'precio' => 450, 'estado' => 1],
            ['nombre' => 'Creatinina Sérica', 'descripcion' => 'Evaluación de función renal.', 'tipo_muestra' => 'Sangre', 'precio' => 200, 'estado' => 1],
            ['nombre' => 'Urea en Sangre', 'descripcion' => 'Medición de urea sérica.', 'tipo_muestra' => 'Sangre', 'precio' => 200, 'estado' => 1],
            ['nombre' => 'Ácido Úrico', 'descripcion' => 'Medición de ácido úrico en sangre.', 'tipo_muestra' => 'Sangre', 'precio' => 220, 'estado' => 1],
            ['nombre' => 'Hemoglobina Glucosilada', 'descripcion' => 'Control promedio de glucosa.', 'tipo_muestra' => 'Sangre', 'precio' => 500, 'estado' => 1],
            ['nombre' => 'Perfil Hepático', 'descripcion' => 'Evaluación integral de la función hepática.', 'tipo_muestra' => 'Sangre', 'precio' => 650, 'estado' => 1],
            ['nombre' => 'TGO / AST', 'descripcion' => 'Enzima hepática AST.', 'tipo_muestra' => 'Sangre', 'precio' => 220, 'estado' => 1],
            ['nombre' => 'TGP / ALT', 'descripcion' => 'Enzima hepática ALT.', 'tipo_muestra' => 'Sangre', 'precio' => 220, 'estado' => 1],
            ['nombre' => 'Bilirrubinas', 'descripcion' => 'Medición de bilirrubina total y fracciones.', 'tipo_muestra' => 'Sangre', 'precio' => 300, 'estado' => 1],
            ['nombre' => 'Proteínas Totales y Albúmina', 'descripcion' => 'Evaluación de proteínas séricas.', 'tipo_muestra' => 'Sangre', 'precio' => 300, 'estado' => 1],
            ['nombre' => 'Electrolitos Séricos', 'descripcion' => 'Medición de sodio, potasio y cloro.', 'tipo_muestra' => 'Sangre', 'precio' => 450, 'estado' => 1],
            ['nombre' => 'Tiempo de Protrombina', 'descripcion' => 'Evaluación de coagulación.', 'tipo_muestra' => 'Sangre', 'precio' => 350, 'estado' => 1],
            ['nombre' => 'Grupo Sanguíneo y Factor RH', 'descripcion' => 'Determinación de grupo ABO y RH.', 'tipo_muestra' => 'Sangre', 'precio' => 180, 'estado' => 1],
            ['nombre' => 'Prueba Rápida VIH', 'descripcion' => 'Detección rápida de VIH.', 'tipo_muestra' => 'Sangre', 'precio' => 400, 'estado' => 1],

            // ORINA
            ['nombre' => 'Examen General de Orina', 'descripcion' => 'Evaluación física, química y microscópica de orina.', 'tipo_muestra' => 'Orina', 'precio' => 180, 'estado' => 1],
            ['nombre' => 'Urocultivo', 'descripcion' => 'Cultivo bacteriano de orina.', 'tipo_muestra' => 'Orina', 'precio' => 500, 'estado' => 1],
            ['nombre' => 'Proteínas en Orina', 'descripcion' => 'Detección de proteínas urinarias.', 'tipo_muestra' => 'Orina', 'precio' => 200, 'estado' => 1],
            ['nombre' => 'Glucosa en Orina', 'descripcion' => 'Detección de glucosa urinaria.', 'tipo_muestra' => 'Orina', 'precio' => 180, 'estado' => 1],
            ['nombre' => 'Cetonas en Orina', 'descripcion' => 'Detección de cuerpos cetónicos.', 'tipo_muestra' => 'Orina', 'precio' => 180, 'estado' => 1],
            ['nombre' => 'Microalbuminuria', 'descripcion' => 'Medición de albúmina en orina.', 'tipo_muestra' => 'Orina', 'precio' => 450, 'estado' => 1],
            ['nombre' => 'Depuración de Creatinina', 'descripcion' => 'Evaluación renal mediante orina y sangre.', 'tipo_muestra' => 'Orina', 'precio' => 600, 'estado' => 1],
            ['nombre' => 'Prueba de Embarazo en Orina', 'descripcion' => 'Detección de hCG en orina.', 'tipo_muestra' => 'Orina', 'precio' => 200, 'estado' => 1],
            ['nombre' => 'Sedimento Urinario', 'descripcion' => 'Evaluación microscópica del sedimento.', 'tipo_muestra' => 'Orina', 'precio' => 220, 'estado' => 1],
            ['nombre' => 'Drogas en Orina', 'descripcion' => 'Tamizaje de sustancias en orina.', 'tipo_muestra' => 'Orina', 'precio' => 700, 'estado' => 1],

            // HECES
            ['nombre' => 'Examen General de Heces', 'descripcion' => 'Evaluación macroscópica y microscópica de heces.', 'tipo_muestra' => 'Heces', 'precio' => 180, 'estado' => 1],
            ['nombre' => 'Coproparasitoscópico', 'descripcion' => 'Búsqueda de parásitos intestinales.', 'tipo_muestra' => 'Heces', 'precio' => 220, 'estado' => 1],
            ['nombre' => 'Sangre Oculta en Heces', 'descripcion' => 'Detección de sangre no visible.', 'tipo_muestra' => 'Heces', 'precio' => 250, 'estado' => 1],
            ['nombre' => 'Coprocultivo', 'descripcion' => 'Cultivo bacteriano de heces.', 'tipo_muestra' => 'Heces', 'precio' => 550, 'estado' => 1],
            ['nombre' => 'Rotavirus en Heces', 'descripcion' => 'Detección de antígeno de rotavirus.', 'tipo_muestra' => 'Heces', 'precio' => 400, 'estado' => 1],
            ['nombre' => 'Helicobacter pylori en Heces', 'descripcion' => 'Detección de antígeno de H. pylori.', 'tipo_muestra' => 'Heces', 'precio' => 550, 'estado' => 1],
            ['nombre' => 'Grasas en Heces', 'descripcion' => 'Evaluación de grasa fecal.', 'tipo_muestra' => 'Heces', 'precio' => 350, 'estado' => 1],
            ['nombre' => 'Leucocitos Fecales', 'descripcion' => 'Detección de leucocitos en heces.', 'tipo_muestra' => 'Heces', 'precio' => 250, 'estado' => 1],
            ['nombre' => 'pH Fecal', 'descripcion' => 'Medición de pH en muestra fecal.', 'tipo_muestra' => 'Heces', 'precio' => 180, 'estado' => 1],
            ['nombre' => 'Azúcares Reductores en Heces', 'descripcion' => 'Detección de azúcares reductores.', 'tipo_muestra' => 'Heces', 'precio' => 250, 'estado' => 1],

        ];

        foreach ($examenes as $examen) {
            Examen::updateOrCreate(
                ['nombre' => $examen['nombre']],
                $examen
            );
        }
    }
}