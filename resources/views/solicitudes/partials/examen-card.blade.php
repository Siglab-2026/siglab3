<div class="col-md-4 mb-4">

    <div class="card shadow-sm h-100">

        <div class="card-body">

            <div class="form-check">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="examenes[]"
                    value="{{ $examen->id }}"
                    id="examen_{{ $examen->id }}"
                >

                <label class="form-check-label w-100" for="examen_{{ $examen->id }}">

                    <h6 class="mb-1">
                        {{ $examen->nombre }}
                    </h6>

                    <p class="mb-1 text-muted small">
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