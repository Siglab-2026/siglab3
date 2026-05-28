<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>

    <div class="container py-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <!-- BOTON VOLVER -->
                <div class="mb-3">
                    <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
                        ← Volver a Solicitudes
                    </a>
                </div>

                <!-- HEADER -->
                <div class="d-flex justify-content-between mb-4">

                    <div>
                        <h3>
                            Solicitud #{{ $solicitud->id }}
                        </h3>

                        <p class="text-muted mb-0">
                            Fecha:
                            {{ $solicitud->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>

                    <div>
                        @if($solicitud->estado == 'pendiente')
                            <span class="badge bg-warning text-dark">Pendiente</span>
                        @elseif($solicitud->estado == 'muestra tomada')
                            <span class="badge bg-info">Muestra Tomada</span>
                        @elseif($solicitud->estado == 'en proceso')
                            <span class="badge bg-primary">En Proceso</span>
                        @elseif($solicitud->estado == 'finalizado')
                            <span class="badge bg-success">Finalizado</span>
                        @endif
                    </div>

                </div>

                <hr>

                <!-- SOLO LABORATORISTA -->
                @if(Auth::user()->role->nombre != 'paciente')

                    <!-- CAMBIAR ESTADO -->
                    <div class="card border-0 shadow-sm mb-4">

                        <div class="card-body">

                            <h5 class="mb-3">
                                Cambiar Estado
                            </h5>

                            @if($solicitud->estado == 'finalizado')

                                <div class="alert alert-success mb-0">
                                    Esta solicitud ya fue finalizada y no puede modificarse.
                                </div>

                            @else

                                <form method="POST"
                                      action="{{ route('solicitudes.estado', $solicitud->id) }}">

                                    @csrf

                                    <div class="row align-items-end">

                                        <div class="col-md-4">

                                            <label class="form-label">
                                                Estado
                                            </label>

                                            <select name="estado" class="form-select">

                                                <option value="pendiente"
                                                    {{ $solicitud->estado == 'pendiente' ? 'selected' : '' }}>
                                                    Pendiente
                                                </option>

                                                <option value="muestra tomada"
                                                    {{ $solicitud->estado == 'muestra tomada' ? 'selected' : '' }}>
                                                    Muestra Tomada
                                                </option>

                                                <option value="en proceso"
                                                    {{ $solicitud->estado == 'en proceso' ? 'selected' : '' }}>
                                                    En Proceso
                                                </option>

                                            </select>

                                        </div>

                                        <div class="col-md-3">

                                            <button class="btn btn-primary">
                                                Actualizar Estado
                                            </button>

                                        </div>

                                    </div>

                                </form>

                            @endif

                        </div>

                    </div>

                    <!-- ESTADO PAGO -->
                    <div class="card border-0 shadow-sm mb-4">

                        <div class="card-body">

                            <h5 class="mb-3">
                                Estado de Pago
                            </h5>

                            @if($solicitud->estado_pago == 'pagado')

                                <div class="alert alert-success mb-0">
                                    Esta solicitud ya fue pagada y no puede modificarse.
                                </div>

                            @else

                                <form method="POST"
                                      action="{{ route('solicitudes.pago', $solicitud->id) }}">

                                    @csrf

                                    <div class="row align-items-end">

                                        <div class="col-md-4">

                                            <label class="form-label">
                                                Estado Pago
                                            </label>

                                            <select name="estado_pago" class="form-select">

                                                <option value="pendiente"
                                                    {{ $solicitud->estado_pago == 'pendiente' ? 'selected' : '' }}>
                                                    Pendiente
                                                </option>

                                                <option value="pagado"
                                                    {{ $solicitud->estado_pago == 'pagado' ? 'selected' : '' }}>
                                                    Pagado
                                                </option>

                                            </select>

                                        </div>

                                        <div class="col-md-3">

                                            <button class="btn btn-success">
                                                Actualizar Pago
                                            </button>

                                        </div>

                                    </div>

                                </form>

                            @endif

                        </div>

                    </div>

                @endif

                <!-- EXAMENES -->
                <h5 class="mb-3">
                    Exámenes Solicitados
                </h5>

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>Examen</th>
                                <th>Tipo Muestra</th>
                                <th>Precio</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($solicitud->detalles as $detalle)

                                <tr>
                                    <td>
                                        {{ $detalle->examen->nombre }}
                                    </td>

                                    <td>
                                        {{ $detalle->examen->tipo_muestra }}
                                    </td>

                                    <td>
                                        C$ {{ number_format($detalle->precio, 2) }}
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <!-- TOTAL -->
                <div class="text-end mt-4">

                    <h4>
                        Total:
                        C$ {{ number_format($solicitud->total, 2) }}
                    </h4>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>