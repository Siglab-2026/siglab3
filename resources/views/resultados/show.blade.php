<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>

    <div class="container py-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>

                        <h3 class="mb-1">

                            Resultados de Laboratorio

                        </h3>

                        <p class="text-muted mb-0">

                            Solicitud #{{ $solicitud->id }}

                        </p>

                    </div>

                    <a href="{{ route('solicitudes.index') }}"
                       class="btn btn-secondary">

                        Volver

                    </a>

                    <a href="{{ route('resultados.pdf', $solicitud->id) }}"
   class="btn btn-danger">

    Descargar PDF

</a>

                </div>

                @foreach($solicitud->detalles as $detalle)

                    <div class="card mb-4 border-0 shadow-sm">

                        <div class="card-header bg-cyan text-white"
                             style="background:#0891b2;">

                            <h5 class="mb-0">

                                {{ $detalle->examen->nombre }}

                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered align-middle">

                                    <thead class="table-light">

                                        <tr>
                                            <th>Parámetro</th>
                                            <th>Resultado</th>
                                            <th>Unidad</th>
                                            <th>Referencia</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach($detalle->resultados as $resultado)

                                            <tr>

                                                <td>

                                                    {{ $resultado->parametro->nombre }}

                                                </td>

                                                <td class="fw-bold">

                                                    {{ $resultado->resultado }}

                                                </td>

                                                <td>

                                                    {{ $resultado->parametro->unidad_medida }}

                                                </td>

                                                <td>

                                                    {{ $resultado->parametro->valor_referencia }}

                                                </td>

                                            </tr>

                                        @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</x-app-layout>