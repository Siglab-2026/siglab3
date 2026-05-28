<x-app-layout>

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Dashboard Administrador
        </h2>

        <p class="text-gray-500 mt-1">
            Resumen general de producción e ingresos del laboratorio.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Solicitudes de hoy</p>
            <h3 class="text-3xl font-bold text-cyan-700 mt-2">
                {{ $solicitudesHoy }}
            </h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Ingresos de hoy</p>
            <h3 class="text-3xl font-bold text-green-600 mt-2">
                C$ {{ number_format($ingresosHoy, 2) }}
            </h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Pacientes registrados</p>
            <h3 class="text-3xl font-bold text-indigo-600 mt-2">
                {{ $pacientes }}
            </h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Solicitudes del mes</p>
            <h3 class="text-3xl font-bold text-cyan-700 mt-2">
                {{ $solicitudesMes }}
            </h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Ingresos del mes</p>
            <h3 class="text-3xl font-bold text-green-600 mt-2">
                C$ {{ number_format($ingresosMes, 2) }}
            </h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Resultados registrados</p>
            <h3 class="text-3xl font-bold text-purple-600 mt-2">
                {{ $resultados }}
            </h3>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="px-6 py-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">
                Últimas Solicitudes
            </h3>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3 text-left">Fecha</th>
                        <th class="px-4 py-3 text-left">Paciente</th>
                        <th class="px-4 py-3 text-left">Total</th>
                        <th class="px-4 py-3 text-left">Estado</th>
                        <th class="px-4 py-3 text-left">Pago</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($ultimasSolicitudes as $solicitud)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-4 py-3">
                                {{ $solicitud->created_at->format('d/m/Y H:i') }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $solicitud->paciente->user->name ?? 'Sin paciente' }}
                            </td>

                            <td class="px-4 py-3 font-semibold">
                                C$ {{ number_format($solicitud->total, 2) }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-full text-xs bg-cyan-100 text-cyan-700">
                                    {{ ucfirst($solicitud->estado) }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                @if($solicitud->estado_pago == 'pagado')
                                    <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
                                        Pagado
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                                        Pendiente
                                    </span>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                No hay solicitudes registradas.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>