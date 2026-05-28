<x-app-layout>

    <div class="max-w-5xl mx-auto">

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                Mi Historial Clínico
            </h2>

            <p class="text-gray-500 mt-1">
                Consulta tus exámenes realizados y resultados disponibles.
            </p>
        </div>

        <!-- RESUMEN DEL PACIENTE -->
        <div class="bg-white shadow-md rounded-2xl p-6 mb-6">

            <h3 class="text-lg font-semibold text-cyan-700 mb-4">
                Información del Paciente
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">

                <div>
                    <span class="text-gray-500">Nombre</span>
                    <p class="font-semibold text-gray-800">
                        {{ $paciente->user->name }}
                    </p>
                </div>

                <div>
                    <span class="text-gray-500">Cédula</span>
                    <p class="font-semibold text-gray-800">
                        {{ $paciente->cedula ?? 'No registrada' }}
                    </p>
                </div>

                <div>
                    <span class="text-gray-500">Sexo</span>
                    <p class="font-semibold text-gray-800">
                        {{ $paciente->sexo ?? 'No registrado' }}
                    </p>
                </div>

                <div>
                    <span class="text-gray-500">Fecha de nacimiento</span>
                    <p class="font-semibold text-gray-800">
                        {{ $paciente->fecha_nacimiento ?? 'No registrada' }}
                    </p>
                </div>

                <div>
                    <span class="text-gray-500">Tipo de sangre</span>
                    <p class="font-semibold text-gray-800">
                        {{ $paciente->tipo_sangre ?? 'No registrado' }}
                    </p>
                </div>

                <div>
                    <span class="text-gray-500">Enfermedades crónicas</span>
                    <p class="font-semibold text-gray-800">
                        {{ $paciente->enfermedades_cronicas ?? 'Ninguna registrada' }}
                    </p>
                </div>

            </div>

            <div class="mt-4">
                <span class="text-gray-500 text-sm">Alergias</span>
                <p class="font-semibold text-gray-800">
                    {{ $paciente->alergias ?? 'Ninguna registrada' }}
                </p>
            </div>

        </div>

        <!-- HISTORIAL -->
        <div class="space-y-4">

            @forelse($solicitudes as $solicitud)

                <div class="bg-white shadow-md rounded-2xl p-6 border-l-4 border-cyan-600">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

                        <div>
                            <h3 class="text-lg font-bold text-gray-800">
                                Solicitud #{{ $solicitud->id }}
                            </h3>

                            <p class="text-sm text-gray-500">
                                Fecha:
                                {{ $solicitud->created_at->format('d/m/Y H:i') }}
                            </p>
                        </div>

                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                            Finalizado
                        </span>

                    </div>

                    <div class="mt-4">

                        <h4 class="font-semibold text-cyan-700 mb-2">
                            Exámenes realizados
                        </h4>

                        <div class="space-y-3">

                            @foreach($solicitud->detalles as $detalle)

                                <div class="border rounded-xl p-4 bg-gray-50">

                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">

                                        <div>
                                            <p class="font-semibold text-gray-800">
                                                {{ $detalle->examen->nombre }}
                                            </p>

                                            <p class="text-sm text-gray-500">
                                                Tipo de muestra:
                                                {{ $detalle->examen->tipo_muestra }}
                                            </p>
                                        </div>

                                        <span class="text-sm text-cyan-700 font-semibold">
                                            Resultado disponible
                                        </span>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            @empty

                <div class="bg-white shadow-md rounded-2xl p-6 text-center">

                    <h3 class="text-lg font-semibold text-gray-700">
                        Aún no tienes historial clínico disponible
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Cuando tus solicitudes sean finalizadas, aparecerán aquí.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>