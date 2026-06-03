<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIGLAB') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
          rel="stylesheet" />

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="font-sans antialiased bg-gray-100">

<div
    x-data="{
        open: window.innerWidth >= 768,
        mobile: window.innerWidth < 768
    }"

    x-init="
        window.addEventListener('resize', () => {

            mobile = window.innerWidth < 768;

            if(mobile)
            {
                open = false;
            }
        });
    "

    class="flex min-h-screen">

    <!-- SIDEBAR -->

    <aside

        :class="mobile
            ? (open ? 'translate-x-0 w-64' : '-translate-x-full w-64')
            : (open ? 'w-64' : 'w-20')"

        class="fixed md:relative z-50
               bg-cyan-700 text-white
               flex flex-col
               transition-all duration-300
               min-h-screen
               shadow-xl">

        <!-- HEADER -->

        <div class="flex items-center justify-between p-4 border-b border-cyan-600">

            <div
                x-show="open || mobile"
                x-transition
                class="text-3xl font-bold tracking-wide whitespace-nowrap">

                SIGLAB

            </div>

            <!-- BOTON DESKTOP -->

            <button
                @click="open = !open"
                class="hidden md:flex text-white text-xl hover:text-cyan-200 transition">

                <i class="fa-solid fa-bars"></i>

            </button>

        </div>

        <!-- USUARIO ARRIBA SOLO MOVIL -->

        <div class="md:hidden p-4 border-b border-cyan-600 bg-cyan-800/40">

            <div
                x-show="open || mobile"
                x-transition>

                <div class="flex items-center gap-3 mb-3">

                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">

                        <i class="fa-solid fa-user text-white"></i>

                    </div>

                    <div class="overflow-hidden">

                        <div class="text-sm font-semibold truncate">

                            {{ Auth::user()->name }}

                        </div>

                        <div class="text-xs text-cyan-200 capitalize">

                            {{ Auth::user()->role->nombre }}

                        </div>

                    </div>

                </div>

            </div>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm transition flex items-center justify-center gap-2">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span
                        x-show="open || mobile"
                        x-transition>

                        Cerrar Sesión

                    </span>

                </button>

            </form>

        </div>

        <!-- MENU -->

        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">

            <!-- DASHBOARD -->

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-600 transition">

                <i class="fa-solid fa-house text-lg min-w-[20px]"></i>

                <span
                    x-show="open || mobile"
                    x-transition>

                    Inicio

                </span>

            </a>

            <!-- PACIENTE -->

            @if(Auth::user()->role->nombre == 'paciente')
<a href="{{ route('pacientes.conoce-siglab') }}"
   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-600 transition">

    <i class="fa-solid fa-circle-play text-lg min-w-[20px]"></i>

    <span x-show="open || mobile" x-transition>
        Conoce SIGLAB
    </span>

</a>

<a href="{{ route('pacientes.como-funciona') }}"
   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-600 transition">

    <i class="fa-solid fa-gears text-lg min-w-[20px]"></i>

    <span x-show="open || mobile" x-transition>
        ¿Cómo funciona?
    </span>

</a>

                <a href="{{ route('solicitudes.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-600 transition">

                    <i class="fa-solid fa-file-medical text-lg min-w-[20px]"></i>

                    <span
                        x-show="open || mobile"
                        x-transition>

                        Mis Solicitudes

                    </span>

                </a>

                <a href="{{ route('pacientes.perfil') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-600 transition">

                    <i class="fa-solid fa-user-doctor text-lg min-w-[20px]"></i>

                    <span
                        x-show="open || mobile"
                        x-transition>

                        Mi Perfil Clínico

                    </span>


                </a>

                <a href="{{ route('pacientes.historial') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-600 transition">

                    <i class="fa-solid fa-clock-rotate-left text-lg min-w-[20px]"></i>

                    <span
                        x-show="open || mobile"
                        x-transition>

                        Mi Historial Clínico

                    </span>

                </a>

            @endif

            <!-- LABORATORISTA -->

            @if(Auth::user()->role->nombre == 'laboratorista')

                <a href="{{ route('solicitudes.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-600 transition">

                    <i class="fa-solid fa-vials text-lg min-w-[20px]"></i>

                    <span
                        x-show="open || mobile"
                        x-transition>

                        Solicitudes

                    </span>

                </a>

            @endif

            <!-- ADMIN -->

            @if(Auth::user()->role->nombre == 'administrador')

                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-600 transition">

                    <i class="fa-solid fa-chart-line text-lg min-w-[20px]"></i>

                    <span
                        x-show="open || mobile"
                        x-transition>

                        Dashboard Admin

                    </span>

                </a>

                <a href="{{ route('admin.reportes.produccion') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-600 transition">

                    <i class="fa-solid fa-file-lines text-lg min-w-[20px]"></i>

                    <span
                        x-show="open || mobile"
                        x-transition>

                        Reporte Producción

                    </span>

                </a>

            @endif

        </nav>

        <!-- FOOTER SOLO DESKTOP -->

        <div class="hidden md:block p-4 border-t border-cyan-600 bg-cyan-800/40">

            <div
                x-show="open"
                x-transition>

                <div class="flex items-center gap-3 mb-3">

                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">

                        <i class="fa-solid fa-user text-white"></i>

                    </div>

                    <div class="overflow-hidden">

                        <div class="text-sm font-semibold truncate">

                            {{ Auth::user()->name }}

                        </div>

                        <div class="text-xs text-cyan-200 capitalize">

                            {{ Auth::user()->role->nombre }}

                        </div>

                    </div>

                </div>

            </div>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm transition flex items-center justify-center gap-2">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span
                        x-show="open"
                        x-transition>

                        Cerrar Sesión

                    </span>

                </button>

            </form>

        </div>

    </aside>

    <!-- OVERLAY MOVIL -->

    <div
        x-show="mobile && open"
        x-transition.opacity
        @click="open = false"
        class="fixed inset-0 bg-black/40 z-40 md:hidden">
    </div>

    <!-- CONTENIDO -->

    <div class="flex-1 w-full">

        <!-- HEADER -->

        <header class="bg-white shadow-sm md:hidden">

            <div class="px-6 py-5 flex items-center gap-4">

                <button
                    @click="open = !open"
                    class="md:hidden text-cyan-700 text-2xl">

                    <i class="fa-solid fa-bars"></i>

                </button>

                @isset($header)

                    {{ $header }}

                @endisset

            </div>

        </header>

        <!-- MAIN -->

        <main class="p-4 md:p-6">

            {{ $slot }}

        </main>

    </div>

</div>

</body>
</html>