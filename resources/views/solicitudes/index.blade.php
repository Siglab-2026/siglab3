<x-app-layout>

    <div class="max-w-7xl mx-auto">

      <!-- ALERTAS -->

@if(session('success'))

    <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">

        {{ session('success') }}

    </div>

@endif

@if(session('error'))

    <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">

        {{ session('error') }}

    </div>

@endif
    
    
    <!-- HEADER -->

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <div>

                <h1 class="text-3xl font-bold text-cyan-700">

                    @if(Auth::user()->role->nombre == 'laboratorista')

                        Solicitudes

                    @else

                        Mis Solicitudes

                    @endif

                </h1>

                <p class="text-gray-500 mt-1">

                    @if(Auth::user()->role->nombre == 'laboratorista')

                        Gestión de solicitudes y resultados clínicos.

                    @else

                        Consulta el estado de tus solicitudes clínicas.

                    @endif

                </p>

            </div>

            <!-- BOTON NUEVA SOLICITUD SOLO PACIENTE -->

            @if(Auth::user()->role->nombre == 'paciente')

                <a href="{{ route('solicitudes.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow transition text-center">

                    <i class="fa-solid fa-plus"></i>

                    Nueva Solicitud

                </a>

            @endif

        </div>

        <!-- CARD -->

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

            <!-- TABLA RESPONSIVE -->

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-gray-100">

                        <tr class="text-left text-gray-700">

                            <th class="px-6 py-4">
                                #
                            </th>

                            @if(Auth::user()->role->nombre == 'laboratorista')

                                <th class="px-6 py-4">
                                    Paciente
                                </th>

                            @endif

                            <th class="px-6 py-4">
                                Fecha
                            </th>

                            <th class="px-6 py-4">
                                Total
                            </th>

                            <th class="px-6 py-4">
                                Estado
                            </th>

                            <th class="px-6 py-4">
                                Pago
                            </th>

                            <th class="px-6 py-4">
                                Acciones
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($solicitudes as $solicitud)

                            <tr class="hover:bg-gray-50 transition">

                                <!-- ID -->

                                <td class="px-6 py-4 font-semibold">

                                    {{ $solicitud->id }}

                                </td>

                                <!-- PACIENTE -->

                                @if(Auth::user()->role->nombre == 'laboratorista')

                                    <td class="px-6 py-4">

                                        <div class="font-semibold text-gray-800">

                                            {{ $solicitud->paciente->user->name }}

                                        </div>

                                        <div class="text-sm text-gray-500">

                                            {{ $solicitud->paciente->user->telefono }}

                                        </div>

                                    </td>

                                @endif

                                <!-- FECHA -->

                                <td class="px-6 py-4 text-gray-600 whitespace-nowrap">

                                    {{ $solicitud->created_at->format('d/m/Y H:i') }}

                                </td>

                                <!-- TOTAL -->

                                <td class="px-6 py-4 font-medium">

                                    C$ {{ number_format($solicitud->total, 2) }}

                                </td>

                                <!-- ESTADO -->

                                <td class="px-6 py-4">

                                    @if($solicitud->estado == 'pendiente')

                                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">

                                            Pendiente

                                        </span>

                                    @elseif($solicitud->estado == 'muestra tomada')

                                        <span class="bg-cyan-100 text-cyan-700 px-3 py-1 rounded-full text-sm font-medium">

                                            Muestra Tomada

                                        </span>

                                    @elseif($solicitud->estado == 'en proceso')

                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">

                                            En Proceso

                                        </span>

                                    @elseif($solicitud->estado == 'finalizado')

                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">

                                            Finalizado

                                        </span>

                                    @endif

                                </td>

                                <!-- PAGO -->

                                <td class="px-6 py-4">

                                    @if($solicitud->estado_pago == 'pagado')

                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">

                                            Pagado

                                        </span>

                                    @else

                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">

                                            Pendiente

                                        </span>

                                    @endif

                                </td>

                                <!-- ACCIONES -->

                                <td class="px-6 py-4">

                                    <div class="flex flex-wrap gap-2">

                                        <!-- VER -->

                                        <a href="{{ route('solicitudes.show', $solicitud->id) }}"
                                           class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm transition">

                                            <i class="fa-solid fa-eye"></i>

                                            Ver

                                        </a>

                                        <!-- REGISTRAR RESULTADOS -->

                                        @if(Auth::user()->role->nombre == 'laboratorista')

                                            <a href="{{ route('resultados.captura', $solicitud->id) }}"
                                               class="bg-cyan-600 hover:bg-cyan-700 text-white px-3 py-2 rounded-lg text-sm transition">

                                                <i class="fa-solid fa-flask"></i>

                                                Resultados

                                            </a>

                                        @endif

                                        <!-- VER RESULTADOS PACIENTE -->

                                        @if(
                                            Auth::user()->role->nombre == 'paciente'
                                            && $solicitud->estado == 'finalizado'
                                        )

                                            <a href="{{ route('resultados.show', $solicitud->id) }}"
                                               class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm transition">

                                                <i class="fa-solid fa-file-medical"></i>

                                                Ver Resultados

                                            </a>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="px-6 py-8 text-center text-gray-500">

                                    No hay solicitudes registradas

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>