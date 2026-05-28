<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\SolicitudDetalle;
use App\Models\Paciente;

class SolicitudController extends Controller
{
    public function create()
    {
        $examenes = Examen::where('estado', 1)->get();

        return view('solicitudes.create', compact('examenes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'examenes' => 'required|array',
            'metodo_pago' => 'required',
        ]);

        $paciente = Paciente::where('user_id', auth()->id())->first();

        $total = 0;

        foreach ($request->examenes as $examenId) {
            $examen = Examen::findOrFail($examenId);
            $total += $examen->precio;
        }

        $estadoPago = $request->metodo_pago == 'tarjeta'
            ? 'pagado'
            : 'pendiente';

        $solicitud = Solicitud::create([
            'paciente_id' => $paciente->id,
            'total' => $total,
            'metodo_pago' => $request->metodo_pago,
            'estado_pago' => $estadoPago,
            'estado' => 'pendiente',
        ]);

        foreach ($request->examenes as $examenId) {
            $examen = Examen::findOrFail($examenId);

            SolicitudDetalle::create([
                'solicitud_id' => $solicitud->id,
                'examen_id' => $examen->id,
                'precio' => $examen->precio,
            ]);
        }

        return redirect()
            ->route('solicitudes.create')
            ->with('success', 'Solicitud creada correctamente');
    }

    public function index()
    {
        if (auth()->user()->role->nombre == 'laboratorista') {
            $solicitudes = Solicitud::with('paciente.user')
                ->latest()
                ->get();
        } else {
            $paciente = Paciente::where('user_id', auth()->id())->first();

            $solicitudes = Solicitud::with('paciente.user')
                ->where('paciente_id', $paciente->id)
                ->latest()
                ->get();
        }

        return view('solicitudes.index', compact('solicitudes'));
    }

    public function show($id)
    {
        $solicitud = Solicitud::with('detalles.examen')
            ->findOrFail($id);

        return view('solicitudes.show', compact('solicitud'));
    }

    public function actualizarEstado(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);

        if ($solicitud->estado == 'finalizado') {
            return redirect()
                ->back()
                ->with('error', 'No se puede modificar una solicitud finalizada.');
        }

        $request->validate([
            'estado' => 'required|in:pendiente,muestra tomada,en proceso',
        ]);

        $solicitud->estado = $request->estado;
        $solicitud->save();

        return redirect()
            ->back()
            ->with('success', 'Estado actualizado correctamente.');
    }

    public function actualizarPago(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);

        if ($solicitud->estado_pago == 'pagado') {
            return redirect()
                ->back()
                ->with('error', 'No se puede modificar el pago porque la solicitud ya está pagada.');
        }

        $request->validate([
            'estado_pago' => 'required|in:pendiente,pagado',
        ]);

        $solicitud->estado_pago = $request->estado_pago;
        $solicitud->save();

        return redirect()
            ->back()
            ->with('success', 'Estado de pago actualizado correctamente.');
    }
}