<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>

<div class="container py-4">

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <form method="POST" action="{{ route('resultados.guardar') }}">
                @csrf

                <h3 class="mb-4">
                    Captura Resultados
                    Solicitud #{{ $solicitud->id }}
                </h3>

                <div class="alert alert-info">
                    Los valores fuera del rango de referencia no se bloquean; se clasifican como
                    <strong>Bajo</strong>, <strong>Normal</strong> o <strong>Alto</strong>.
                </div>

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
                                        name="resultados[{{ $detalle->id }}][{{ $parametro->id }}]"
                                        class="form-control form-control-sm resultado-input"
                                        data-referencia="{{ $parametro->valor_referencia }}"
                                    >

                                    <div class="d-flex justify-content-between align-items-center mt-1">

                                        <small class="text-muted">
                                            Referencia:
                                            {{ $parametro->valor_referencia ?: 'N/D' }}
                                        </small>

                                        <small class="interpretacion-resultado text-muted">
                                            Interpretación: N/D
                                        </small>

                                    </div>

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

<script>
document.addEventListener('DOMContentLoaded', function () {

    function interpretarResultado(valor, referencia) {
        if (!valor || !referencia) {
            return null;
        }

        valor = valor.trim().replace(',', '.');
        referencia = referencia.trim().replace(',', '.');

        if (isNaN(valor)) {
            return null;
        }

        const rango = referencia.match(/^([\d.]+)\s*-\s*([\d.]+)$/);

        if (!rango) {
            return null;
        }

        const min = parseFloat(rango[1]);
        const max = parseFloat(rango[2]);
        const valorNumerico = parseFloat(valor);

        if (valorNumerico < min) {
            return 'Bajo';
        }

        if (valorNumerico > max) {
            return 'Alto';
        }

        return 'Normal';
    }

    document.querySelectorAll('.resultado-input').forEach(function (input) {

        input.addEventListener('input', function () {

            const referencia = this.dataset.referencia;
            const valor = this.value;

            const interpretacion = interpretarResultado(valor, referencia);

            const contenedor = this.closest('.mb-3');
            const etiqueta = contenedor.querySelector('.interpretacion-resultado');

            etiqueta.className = 'interpretacion-resultado';

            if (interpretacion === 'Alto') {
                etiqueta.innerHTML = 'Interpretación: <span class="badge bg-danger">Alto</span>';
            } else if (interpretacion === 'Bajo') {
                etiqueta.innerHTML = 'Interpretación: <span class="badge bg-warning text-dark">Bajo</span>';
            } else if (interpretacion === 'Normal') {
                etiqueta.innerHTML = 'Interpretación: <span class="badge bg-success">Normal</span>';
            } else {
                etiqueta.className = 'interpretacion-resultado text-muted';
                etiqueta.innerHTML = 'Interpretación: N/D';
            }

        });

    });

});
</script>

</x-app-layout>