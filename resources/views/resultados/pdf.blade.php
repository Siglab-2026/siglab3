<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resultado de Laboratorio - SIGLAB</title>

    <style>
        @page {
            margin: 35px 40px;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 12px;
            color: #1f2937;
        }

        .header {
            width: 100%;
            border-bottom: 3px solid #0891b2;
            padding-bottom: 12px;
            margin-bottom: 18px;
        }

        .logo {
            width: 70px;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            color: #0891b2;
            margin: 0;
        }

        .subtitle {
            font-size: 12px;
            color: #4b5563;
            margin: 3px 0;
        }

        .document-title {
            text-align: center;
            background: #ecfeff;
            color: #0e7490;
            padding: 10px;
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 18px;
            border-radius: 6px;
        }

        .section-title {
            background: #f1f5f9;
            color: #0e7490;
            padding: 8px 10px;
            font-weight: bold;
            border-left: 5px solid #0891b2;
            margin-top: 16px;
            margin-bottom: 8px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        .info-table td {
            border: 1px solid #d1d5db;
            padding: 8px;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            color: #374151;
        }

        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        .results-table th {
            background: #0891b2;
            color: #ffffff;
            padding: 8px;
            border: 1px solid #0891b2;
            font-size: 10px;
        }

        .results-table td {
            padding: 8px;
            border: 1px solid #d1d5db;
            font-size: 10px;
        }

        .results-table tr:nth-child(even) {
            background: #f9fafb;
        }

        .result-value {
            font-weight: bold;
            color: #111827;
        }

        .estado-alto {
            color: #dc2626;
            font-weight: bold;
        }

        .estado-bajo {
            color: #d97706;
            font-weight: bold;
        }

        .estado-normal {
            color: #16a34a;
            font-weight: bold;
        }

        .estado-nd {
            color: #6b7280;
        }

        .signature {
            margin-top: 45px;
            width: 100%;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #374151;
            width: 250px;
            margin: 0 auto 6px auto;
        }

        .note {
            margin-top: 25px;
            font-size: 10px;
            color: #6b7280;
            text-align: justify;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
        }

        .footer {
            margin-top: 15px;
            text-align: center;
            font-size: 10px;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <table class="header">
        <tr>
            <td width="18%">
                <img src="{{ public_path('images/logo.png') }}" class="logo">
            </td>

            <td width="55%">
                <p class="brand">SIGLAB</p>
                <p class="subtitle">Sistema de Gestión de Laboratorio Clínico</p>
                <p class="subtitle">Resultados de exámenes clínicos</p>
            </td>

            <td width="27%" style="text-align:right; font-size:11px;">
                <strong>Solicitud:</strong> #{{ $solicitud->id }}<br>
                <strong>Fecha:</strong> {{ $solicitud->created_at->format('d/m/Y H:i') }}<br>
                <strong>Estado:</strong> {{ ucfirst($solicitud->estado) }}
            </td>
        </tr>
    </table>

    <div class="document-title">
        INFORME DE RESULTADOS DE LABORATORIO
    </div>

    <div class="section-title">
        Datos del Paciente
    </div>

    <table class="info-table">
        <tr>
            <td width="50%">
                <span class="label">Paciente:</span>
                {{ $solicitud->paciente->user->name }}<br><br>

                <span class="label">Correo:</span>
                {{ $solicitud->paciente->user->email }}<br><br>

                <span class="label">Teléfono:</span>
                {{ $solicitud->paciente->user->telefono ?? 'N/D' }}
            </td>

            <td width="50%">
                <span class="label">Cédula:</span>
                {{ $solicitud->paciente->cedula ?? 'N/D' }}<br><br>

                <span class="label">Sexo:</span>
                {{ $solicitud->paciente->sexo ?? 'N/D' }}<br><br>

                <span class="label">Fecha nacimiento:</span>
                {{ $solicitud->paciente->fecha_nacimiento ?? 'N/D' }}
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <span class="label">Dirección:</span>
                {{ $solicitud->paciente->user->direccion ?? 'N/D' }}
            </td>
        </tr>
    </table>

    @foreach($solicitud->detalles as $detalle)

        <div class="section-title">
            {{ $detalle->examen->nombre }}
        </div>

        <table class="results-table">
            <thead>
                <tr>
                    <th width="28%">Parámetro</th>
                    <th width="18%">Resultado</th>
                    <th width="17%">Unidad</th>
                    <th width="22%">Valor de Referencia</th>
                    <th width="15%">Interpretación</th>
                </tr>
            </thead>

            <tbody>
                @foreach($detalle->resultados as $resultado)
                    <tr>
                        <td>{{ $resultado->parametro->nombre }}</td>

                        <td class="result-value">
                            {{ $resultado->resultado ?? 'N/D' }}
                        </td>

                        <td>
                            {{ $resultado->parametro->unidad_medida ?? 'N/D' }}
                        </td>

                        <td>
                            {{ $resultado->parametro->valor_referencia ?? 'N/D' }}
                        </td>

                        <td>
                            @if($resultado->interpretacion == 'Alto')
                                <span class="estado-alto">Alto</span>
                            @elseif($resultado->interpretacion == 'Bajo')
                                <span class="estado-bajo">Bajo</span>
                            @elseif($resultado->interpretacion == 'Normal')
                                <span class="estado-normal">Normal</span>
                            @else
                                <span class="estado-nd">N/D</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endforeach

    <div class="signature">
        <div class="signature-line"></div>
        <strong>Responsable de Laboratorio</strong><br>
        SIGLAB
    </div>

    <div class="note">
        Este documento contiene información clínica confidencial y ha sido generado automáticamente por SIGLAB.
        Los resultados deben ser interpretados por personal médico calificado de acuerdo con el estado clínico del paciente.
    </div>

    <div class="footer">
        © {{ date('Y') }} SIGLAB - Sistema de Gestión de Laboratorio Clínico
    </div>

</body>
</html>