<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>

    <div class="container py-4">

        <h2 class="mb-2">
            Nueva Solicitud de Exámenes
        </h2>

        <p class="text-muted mb-4">
            Seleccione los exámenes según el tipo de muestra.
        </p>

        <form method="POST" action="{{ route('solicitudes.store') }}">
            @csrf

            @php
                $examenesSangre = $examenes->where('tipo_muestra', 'Sangre');
                $examenesOrina = $examenes->where('tipo_muestra', 'Orina');
                $examenesHeces = $examenes->where('tipo_muestra', 'Heces');
            @endphp

            <ul class="nav nav-tabs mb-4" id="examenesTabs" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active"
                            id="sangre-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#sangre"
                            type="button"
                            role="tab">
                        🩸 Sangre
                        <span class="badge bg-danger ms-1">
                            {{ $examenesSangre->count() }}
                        </span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link"
                            id="orina-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#orina"
                            type="button"
                            role="tab">
                        🧪 Orina
                        <span class="badge bg-warning text-dark ms-1">
                            {{ $examenesOrina->count() }}
                        </span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link"
                            id="heces-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#heces"
                            type="button"
                            role="tab">
                        🧫 Heces
                        <span class="badge bg-success ms-1">
                            {{ $examenesHeces->count() }}
                        </span>
                    </button>
                </li>

            </ul>

            <div class="tab-content" id="examenesTabsContent">

                <div class="tab-pane fade show active"
                     id="sangre"
                     role="tabpanel"
                     aria-labelledby="sangre-tab">

                    <div class="row">
                        @foreach($examenesSangre as $examen)
                            @include('solicitudes.partials.examen-card', ['examen' => $examen])
                        @endforeach
                    </div>

                </div>

                <div class="tab-pane fade"
                     id="orina"
                     role="tabpanel"
                     aria-labelledby="orina-tab">

                    <div class="row">
                        @foreach($examenesOrina as $examen)
                            @include('solicitudes.partials.examen-card', ['examen' => $examen])
                        @endforeach
                    </div>

                </div>

                <div class="tab-pane fade"
                     id="heces"
                     role="tabpanel"
                     aria-labelledby="heces-tab">

                    <div class="row">
                        @foreach($examenesHeces as $examen)
                            @include('solicitudes.partials.examen-card', ['examen' => $examen])
                        @endforeach
                    </div>

                </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</x-app-layout>