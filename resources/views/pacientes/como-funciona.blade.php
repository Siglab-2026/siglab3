<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>

<div class="container py-4">

    <div class="card border-0 shadow-sm">
        <div class="card-body text-center">

            <h3 class="mb-2">
                ⚙️ ¿Cómo funciona SIGLAB?
            </h3>

            <p class="text-muted mb-4">
                Conoce el flujo operativo desde el registro del paciente hasta la consulta de resultados.
            </p>

           <img
    src="{{ asset('images/flujo-siglab.png') }}"
    alt="Flujo operativo SIGLAB"
    class="img-fluid rounded shadow-sm d-block mx-auto"
    style="max-width: 520px; width: 100%;"
>

        </div>
    </div>

</div>

</x-app-layout>