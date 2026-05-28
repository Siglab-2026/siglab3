<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>

<div class="container py-4">

    <div class="card shadow-sm border-0">

        <div class="card-body">
<form method="POST"
      action="{{ route('resultados.guardar') }}">
      
    @csrf
            <h3 class="mb-4">

                Captura Resultados
                Solicitud #{{ $solicitud->id }}

            </h3>

            @foreach($solicitud->detalles as $detalle)

                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body">

                        <h5 class="fw-bold text-primary mb-3">

                            {{ $detalle->examen->nombre }}

                        </h5>

                        <hr>

                        @foreach($detalle->examen->parametros as $parametro)

                            <div class="mb-3">

                                <label class="form-label">

                                    {{ $parametro->nombre }}

                                    @if($parametro->unidad_medida)

                                        ({{ $parametro->unidad_medida }})

                                    @endif

                                </label>

                               <input
    type="text"

    name="resultados[
        {{ $detalle->id }}
    ][
        {{ $parametro->id }}
    ]"

    class="form-control form-control-sm"
>

                                <small class="text-muted">

                                    Referencia:
                                    {{ $parametro->valor_referencia }}

                                </small>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endforeach

            <div class="text-end">

    <button class="btn btn-success">

        Guardar Resultados

    </button>

</div>

</form>
        </div>

    </div>

</div>

</x-app-layout>