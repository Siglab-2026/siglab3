<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\Paciente;
use App\Models\Resultado;
use Carbon\Carbon;
use App\Models\SolicitudDetalle;
use App\Models\Examen;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // HOY

        $solicitudesHoy =
            Solicitud::whereDate(
                'created_at',
                Carbon::today()
            )->count();

        $ingresosHoy =
            Solicitud::whereDate(
                'created_at',
                Carbon::today()
            )
            ->where('estado_pago', 'pagado')
            ->sum('total');

        // MES

        $solicitudesMes =
            Solicitud::whereMonth(
                'created_at',
                Carbon::now()->month
            )->count();

        $ingresosMes =
            Solicitud::whereMonth(
                'created_at',
                Carbon::now()->month
            )
            ->where('estado_pago', 'pagado')
            ->sum('total');

        // TOTALES

        $pacientes =
            Paciente::count();

        $resultados =
            Resultado::count();

        // ULTIMAS SOLICITUDES

        $ultimasSolicitudes =
            Solicitud::with('paciente.user')
            ->latest()
            ->take(10)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'solicitudesHoy',
                'ingresosHoy',
                'solicitudesMes',
                'ingresosMes',
                'pacientes',
                'resultados',
                'ultimasSolicitudes'
            )
        );
    }

    public function reporteProduccion(Request $request)
{
    $pacientes = Paciente::with('user')->get();
    $examenes = Examen::where('estado', 1)->get();

    $query = SolicitudDetalle::with([
        'solicitud.paciente.user',
        'examen'
    ]);

    if ($request->filled('fecha_inicio')) {
        $query->whereHas('solicitud', function ($q) use ($request) {
            $q->whereDate('created_at', '>=', $request->fecha_inicio);
        });
    }

    if ($request->filled('fecha_fin')) {
        $query->whereHas('solicitud', function ($q) use ($request) {
            $q->whereDate('created_at', '<=', $request->fecha_fin);
        });
    }

    if ($request->filled('paciente_id')) {
        $query->whereHas('solicitud', function ($q) use ($request) {
            $q->where('paciente_id', $request->paciente_id);
        });
    }

    if ($request->filled('examen_id')) {
        $query->where('examen_id', $request->examen_id);
    }

    $detalles = $query->latest()->get();

    $totalExamenes = $detalles->count();
    $montoTotal = $detalles->sum('precio');
    $montoPagado = $detalles
        ->where('solicitud.estado_pago', 'pagado')
        ->sum('precio');

    $montoPendiente = $montoTotal - $montoPagado;

    return view('admin.reportes.produccion', compact(
        'pacientes',
        'examenes',
        'detalles',
        'totalExamenes',
        'montoTotal',
        'montoPagado',
        'montoPendiente'
    ));
}
}