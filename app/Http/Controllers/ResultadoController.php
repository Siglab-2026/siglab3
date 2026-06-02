<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\Resultado;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultadoController extends Controller
{
    private function interpretarResultado($valor, $referencia)
    {
        if (!$valor || !$referencia) {
            return null;
        }

        $valor = str_replace(',', '.', trim($valor));
        $referencia = str_replace(',', '.', trim($referencia));

        if (!is_numeric($valor)) {
            return null;
        }

        if (preg_match('/^([\d.]+)\s*-\s*([\d.]+)$/', $referencia, $m)) {
            $min = (float) $m[1];
            $max = (float) $m[2];
            $valorNumerico = (float) $valor;

            if ($valorNumerico < $min) {
                return 'Bajo';
            }

            if ($valorNumerico > $max) {
                return 'Alto';
            }

            return 'Normal';
        }

        return null;
    }

    private function agregarInterpretacion($solicitud)
    {
        foreach ($solicitud->detalles as $detalle) {
            foreach ($detalle->resultados as $resultado) {
                $resultado->interpretacion = $this->interpretarResultado(
                    $resultado->resultado,
                    $resultado->parametro->valor_referencia ?? null
                );
            }
        }

        return $solicitud;
    }

    public function guardar(Request $request)
    {
        $solicitud = null;

        foreach ($request->resultados as $detalleId => $parametros) {
            foreach ($parametros as $parametroId => $valor) {
                Resultado::create([
                    'solicitud_detalle_id' => $detalleId,
                    'parametro_examen_id' => $parametroId,
                    'resultado' => $valor,
                ]);
            }

            $detalle = \App\Models\SolicitudDetalle::find($detalleId);
            $solicitud = $detalle->solicitud;
        }

        if ($solicitud) {
            $solicitud->estado = 'finalizado';
            $solicitud->save();
        }

        return redirect()
            ->route('solicitudes.index')
            ->with('success', 'Resultados guardados correctamente');
    }

    public function captura($id)
    {
        $solicitud = Solicitud::with(
            'detalles.examen.parametros',
            'detalles.resultados'
        )->findOrFail($id);

        if ($solicitud->estado == 'finalizado') {
            return redirect()
                ->route('solicitudes.index')
                ->with('error', 'Los resultados ya fueron registrados y no pueden modificarse.');
        }

        return view('resultados.captura', compact('solicitud'));
    }

    public function show($id)
    {
        $solicitud = Solicitud::with([
            'detalles.examen',
            'detalles.resultados.parametro'
        ])->findOrFail($id);

        $solicitud = $this->agregarInterpretacion($solicitud);

        return view('resultados.show', compact('solicitud'));
    }

    public function pdf($id)
    {
        $solicitud = Solicitud::with([
            'paciente.user',
            'detalles.examen',
            'detalles.resultados.parametro'
        ])->findOrFail($id);

        $solicitud = $this->agregarInterpretacion($solicitud);

        $pdf = Pdf::loadView('resultados.pdf', compact('solicitud'));

        return $pdf->download('resultado_'.$solicitud->id.'.pdf');
    }
}