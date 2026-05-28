<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\Resultado;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultadoController extends Controller
{

   public function guardar(Request $request)
{

    $solicitud = null;

    foreach ($request->resultados as $detalleId => $parametros)
    {

        foreach ($parametros as $parametroId => $valor)
        {

            Resultado::create([

                'solicitud_detalle_id' => $detalleId,

                'parametro_examen_id' => $parametroId,

                'resultado' => $valor,
            ]);
        }

        // OBTENER SOLICITUD

        $detalle = \App\Models\SolicitudDetalle::find($detalleId);

        $solicitud = $detalle->solicitud;
    }

    // CAMBIAR A FINALIZADO

    if($solicitud)
    {
        $solicitud->estado = 'finalizado';

        $solicitud->save();
    }

    return redirect()
        ->route('solicitudes.index')
        ->with(
            'success',
            'Resultados guardados correctamente'
        );
}

    public function captura($id)
{

    $solicitud = Solicitud::with(
        'detalles.examen.parametros',
        'detalles.resultados'
    )->findOrFail($id);

    // VALIDAR SI YA ESTA FINALIZADO

    if($solicitud->estado == 'finalizado')
    {
        return redirect()
            ->route('solicitudes.index')
            ->with(
                'error',
                'Los resultados ya fueron registrados y no pueden modificarse.'
            );
    }

    return view(
        'resultados.captura',
        compact('solicitud')
    );
}

    public function show($id)
    {

        $solicitud = Solicitud::with([

            'detalles.examen',

            'detalles.resultados.parametro'

        ])->findOrFail($id);

        return view(
            'resultados.show',
            compact('solicitud')
        );
    }

    public function pdf($id)
    {

        $solicitud = Solicitud::with([

            'paciente.user',

            'detalles.examen',

            'detalles.resultados.parametro'

        ])->findOrFail($id);

        $pdf = Pdf::loadView(
            'resultados.pdf',
            compact('solicitud')
        );

        return $pdf->download(
            'resultado_'.$solicitud->id.'.pdf'
        );
    }

}