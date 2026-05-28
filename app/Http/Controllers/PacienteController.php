<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function perfil()
    {
        $paciente = Paciente::where('user_id', auth()->id())->firstOrFail();

        return view('pacientes.perfil', compact('paciente'));
    }

    public function actualizarPerfil(Request $request)
    {
        $request->validate([
            'cedula' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|string|max:20',
            'tipo_sangre' => 'nullable|string|max:10',
            'enfermedades_cronicas' => 'nullable|array',
            'enfermedades_cronicas.*' => 'string|max:100',
            'alergias' => 'nullable|string',
            'otra_enfermedad' => 'nullable|string|max:255',
        ]);

        $paciente = Paciente::where('user_id', auth()->id())->firstOrFail();

        $paciente->update([
            'cedula' => $request->cedula,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'sexo' => $request->sexo,
            'tipo_sangre' => $request->tipo_sangre,
           'enfermedades_cronicas' => $this->procesarEnfermedades($request),
            'alergias' => $request->alergias,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Perfil clínico actualizado correctamente.');
    }

public function historial()
{
    $paciente = Paciente::with([
        'user',
        'solicitudes.detalles.examen',
        'solicitudes.detalles.resultados.parametro'
    ])
    ->where('user_id', auth()->id())
    ->firstOrFail();

    $solicitudes = $paciente->solicitudes
        ->where('estado', 'finalizado')
        ->sortByDesc('created_at');

    return view('pacientes.historial', compact('paciente', 'solicitudes'));
}

    private function procesarEnfermedades($request)
{
    $enfermedades = $request->enfermedades_cronicas ?? [];

    if ($request->filled('otra_enfermedad')) {

        $enfermedades[] =
            'Otra: ' . $request->otra_enfermedad;
    }

    return count($enfermedades)
        ? implode(',', $enfermedades)
        : null;
}
}