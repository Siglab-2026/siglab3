<x-app-layout>

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Reporte de Producción
        </h2>

        <p class="text-gray-500 mt-1">
            Consulta la producción del laboratorio por fecha, paciente y examen.
        </p>
    </div>

    <!-- FILTROS -->
    <div class="bg-white rounded-2xl shadow p-6 mb-6">

        <form method="GET" action="{{ route('admin.reportes.produccion') }}">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Fecha inicio
                    </label>

                    <input type="date"
                           name="fecha_inicio"
                           value="{{ request('fecha_inicio') }}"
                           class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Fecha fin
                    </label>

                    <input type="date"
                           name="fecha_fin"
                           value="{{ request('fecha_fin') }}"
                           class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Paciente
                    </label>

                    <select name="paciente_id"
                            class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">

                        <option value="">Todos</option>

                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}"
                                {{ request('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                {{ $paciente->user->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Examen
                    </label>

                    <select name="examen_id"
                            class="w-full rounded-xl border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">

                        <option value="">Todos</option>

                        @foreach($examenes as $examen)
                            <option value="{{ $examen->id }}"
                                {{ request('examen_id') == $examen->id ? 'selected' : '' }}>
                                {{ $examen->nombre }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            <div class="flex justify-end gap-3 mt-5">

                <a href="{{ route('admin.reportes.produccion') }}"
                   class="px-5 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 transition">
                    Limpiar
                </a>

                <button class="px-5 py-2 rounded-xl bg-cyan-700 hover:bg-cyan-800 text-white transition">
                    Filtrar
                </button>

            </div>

        </form>

    </div>

    <!-- RESUMEN -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Total exámenes</p>
            <h3 class="text-3xl font-bold text-cyan-700 mt-2">
                {{ $totalExamenes }}
            </h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Monto total</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">
                C$ {{ number_format($montoTotal, 2) }}
            </h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Monto pagado</p>
            <h3 class="text-3xl font-bold text-green-600 mt-2">
                C$ {{ number_format($montoPagado, 2) }}
            </h3>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <p class="text-sm text-gray-500">Monto pendiente</p>
            <h3 class="text-3xl font-bold text-yellow-600 mt-2">
                C$ {{ number_format($montoPendiente, 2) }}
            </h3>
        </div>

    </div>

    <!-- GRID -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="px-6 py-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">
                Detalle de producción
            </h3>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3 text-left">Fecha</th>
                        <th class="px-4 py-3 text-left">Solicitud</th>
                        <th class="px-4 py-3 text-left">Paciente</th>
                        <th class="px-4 py-3 text-left">Examen</th>
                        <th class="px-4 py-3 text-left">Tipo muestra</th>
                        <th class="px-4 py-3 text-left">Precio</th>
                        <th class="px-4 py-3 text-left">Estado</th>
                        <th class="px-4 py-3 text-left">Pago</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($detalles as $detalle)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-4 py-3">
                                {{ $detalle->solicitud->created_at->format('d/m/Y') }}
                            </td>

                            <td class="px-4 py-3">
                                #{{ $detalle->solicitud->id }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $detalle->solicitud->paciente->user->name ?? 'Sin paciente' }}
                            </td>

                            <td class="px-4 py-3 font-semibold">
                                {{ $detalle->examen->nombre }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $detalle->examen->tipo_muestra }}
                            </td>

                            <td class="px-4 py-3 font-semibold">
                                C$ {{ number_format($detalle->precio, 2) }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-full text-xs bg-cyan-100 text-cyan-700">
                                    {{ ucfirst($detalle->solicitud->estado) }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                @if($detalle->solicitud->estado_pago == 'pagado')
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
                            <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                                No se encontraron registros para los filtros seleccionados.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>