<x-app-layout>

    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->

        <div class="mb-6">

            <h2 class="text-2xl font-bold text-gray-800">
                Mi Perfil Clínico
            </h2>

            <p class="text-gray-500 mt-1">
                Completa y mantén actualizada tu información clínica básica.
            </p>

        </div>

        <!-- ALERTA -->

        @if(session('success'))

            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">

                {{ session('success') }}

            </div>

        @endif

        <!-- CARD -->

        <div class="bg-white shadow-md rounded-2xl p-6">

            <form method="POST"
                  action="{{ route('pacientes.perfil.actualizar') }}">

                @csrf

                <!-- DATOS PERSONALES -->

                <div class="mb-8">

                    <h3 class="text-lg font-semibold text-cyan-700 mb-4">

                        Datos Personales

                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- CEDULA -->

                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Cédula

                            </label>

                            <input
                                type="text"
                                name="cedula"
                                value="{{ old('cedula', $paciente->cedula) }}"
                                class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">

                        </div>

                        <!-- FECHA NACIMIENTO -->

                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Fecha de Nacimiento

                            </label>

                            <input
                                type="date"
                                name="fecha_nacimiento"
                                value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}"
                                class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">

                        </div>

                        <!-- SEXO -->

                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Sexo

                            </label>

                            <select
                                name="sexo"
                                class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">

                                <option value="">
                                    Seleccione
                                </option>

                                <option value="Masculino"
                                    {{ $paciente->sexo == 'Masculino' ? 'selected' : '' }}>

                                    Masculino

                                </option>

                                <option value="Femenino"
                                    {{ $paciente->sexo == 'Femenino' ? 'selected' : '' }}>

                                    Femenino

                                </option>

                            </select>

                        </div>

                        <!-- TIPO SANGRE -->

                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Tipo de Sangre

                            </label>

                            <select
                                name="tipo_sangre"
                                class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">

                                <option value="">
                                    Seleccione
                                </option>

                                @foreach([
                                    'A+',
                                    'A-',
                                    'B+',
                                    'B-',
                                    'AB+',
                                    'AB-',
                                    'O+',
                                    'O-'
                                ] as $tipo)

                                    <option value="{{ $tipo }}"
                                        {{ $paciente->tipo_sangre == $tipo ? 'selected' : '' }}>

                                        {{ $tipo }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>

                <!-- DATOS CLINICOS -->

                <div class="mb-8">

                    <h3 class="text-lg font-semibold text-cyan-700 mb-4">

                        Datos Clínicos

                    </h3>

                    @php

                        $enfermedadesSeleccionadas = [];

                        if($paciente->enfermedades_cronicas)
                        {
                            $enfermedadesSeleccionadas =
                                explode(',', $paciente->enfermedades_cronicas);
                        }

                    @endphp

                    <!-- ENFERMEDADES -->

                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 mb-3">

                            Enfermedades Crónicas

                        </label>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                            @foreach([
                                'Diabetes',
                                'Hipertensión',
                                'Asma',
                                'Enfermedad renal',
                                'Enfermedad cardíaca',
                                'Artritis',
                                'Epilepsia',
                                'Problemas tiroideos',
                                'Colesterol alto',
                                'Otra'
                            ] as $enfermedad)

                                <label class="flex items-center gap-2">

                                    @if($enfermedad == 'Otra')

                                        <input
                                            type="checkbox"
                                            id="checkOtra"
                                            name="enfermedades_cronicas[]"
                                            value="Otra"
                                            class="rounded border-gray-300 text-cyan-600 focus:ring-cyan-500"

                                            {{ in_array($enfermedad, $enfermedadesSeleccionadas)
                                                ? 'checked'
                                                : '' }}>

                                    @else

                                        <input
                                            type="checkbox"
                                            name="enfermedades_cronicas[]"
                                            value="{{ $enfermedad }}"
                                            class="rounded border-gray-300 text-cyan-600 focus:ring-cyan-500"

                                            {{ in_array($enfermedad, $enfermedadesSeleccionadas)
                                                ? 'checked'
                                                : '' }}>

                                    @endif

                                    <span class="text-sm text-gray-700">

                                        {{ $enfermedad }}

                                    </span>

                                </label>

                            @endforeach

                        </div>

                    </div>

                    <!-- OTRA ENFERMEDAD -->

                    <div
                        id="campoOtra"
                        class="mt-4 hidden">

                        <label class="block text-sm font-medium text-gray-700 mb-1">

                            Otra enfermedad crónica

                        </label>

                        <input
                            type="text"
                            name="otra_enfermedad"
                            value="{{ old('otra_enfermedad') }}"
                            placeholder="Especifique otra enfermedad..."
                            class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">

                    </div>

                    <!-- ALERGIAS -->

                    <div class="mt-6">

                        <label class="block text-sm font-medium text-gray-700 mb-1">

                            Alergias

                        </label>

                        <textarea
                            name="alergias"
                            rows="4"
                            placeholder="Ejemplo: Penicilina, Mariscos, Polen..."
                            class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">{{ old('alergias', $paciente->alergias) }}</textarea>

                    </div>

                </div>

                <!-- BOTON -->

                <div class="flex justify-end">

                    <button
                        class="bg-cyan-700 hover:bg-cyan-800 text-white px-6 py-3 rounded-xl transition">

                        Guardar Perfil Clínico

                    </button>

                </div>

            </form>

        </div>

    </div>

    <script>

        const checkOtra =
            document.getElementById('checkOtra');

        const campoOtra =
            document.getElementById('campoOtra');

        function toggleOtra()
        {
            if(checkOtra.checked)
            {
                campoOtra.classList.remove('hidden');
            }
            else
            {
                campoOtra.classList.add('hidden');
            }
        }

        checkOtra.addEventListener('change', toggleOtra);

        toggleOtra();

    </script>

</x-app-layout>