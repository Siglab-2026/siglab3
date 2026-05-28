<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<x-app-layout>


    <div class="container py-4">

        <h2 class="mb-4">
            Nueva Solicitud de Exámenes
        </h2>

        <form method="POST" action="{{ route('solicitudes.store') }}">
    @csrf

            <div class="row">

                @foreach($examenes as $examen)

                    <div class="col-md-4 mb-4">

                        <div class="card shadow-sm h-100">

                            <div class="card-body">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                    type="checkbox"
                                    name="examenes[]"
                                    value="{{ $examen->id }}"
                                    >

                                    <label class="form-check-label">

                                        <h5>
                                            {{ $examen->nombre }}
                                        </h5>

                                        <p class="mb-1">
                                            {{ $examen->tipo_muestra }}
                                        </p>

                                        <strong>
                                            C$ {{ number_format($examen->precio, 2) }}
                                        </strong>

                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="card shadow-sm border-0 mt-4">

    <div class="card-body">

        <h5 class="mb-3">
            Método de Pago
        </h5>

        <div class="form-check mb-2">

            <input
                class="form-check-input"
                type="radio"
                name="metodo_pago"
                value="tarjeta"
                required
            >

            <label class="form-check-label">

                Tarjeta (Pago en línea)

            </label>

        </div>

        <div class="form-check">

            <input
                class="form-check-input"
                type="radio"
                name="metodo_pago"
                value="domicilio"
                required
            >

            <label class="form-check-label">

                Pago al momento de la visita

            </label>

        </div>

    </div>

</div>

            <button class="btn btn-primary mt-4">
                Continuar
            </button>



        </form>

    </div>

</x-app-layout>