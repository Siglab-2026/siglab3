<x-app-layout>

    <x-slot name="header">

        <h2 class="font-bold text-2xl text-cyan-700">

            Panel Principal

        </h2>

    </x-slot>

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="grid grid-cols-1 md:grid-cols-2 items-center">

            <!-- TEXTO -->

            <div class="p-10">

                <h1 class="text-4xl font-bold text-cyan-700 leading-tight">

                    Bienvenido a SIGLAB 

                </h1>

                <p class="mt-6 text-gray-600 text-lg leading-relaxed">

                    Sistema de Gestión de Laboratorio Clínico diseñado para
                    administrar solicitudes, resultados médicos y procesos
                    clínicos de forma rápida, moderna y segura.

                </p>

                

            </div>

            <!-- IMAGEN -->

            <div class="flex justify-center p-6 bg-cyan-50">

                <img src="{{ asset('images/laboratorio.png') }}"
                     alt="Salud"
                     class="max-h-[400px] object-contain">

            </div>

        </div>

    </div>

</x-app-layout>