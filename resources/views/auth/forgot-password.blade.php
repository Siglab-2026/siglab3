<x-guest-layout>

    <div class="mb-4 text-center">

        <h2 class="text-xl font-bold text-gray-800">
            Recuperar Contraseña
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Ingresa tu correo electrónico y te enviaremos un enlace
            para restablecer tu contraseña.
        </p>

    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>

            <x-input-label for="email" :value="__('Correo electrónico')" />

            <x-text-input id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus />

            <x-input-error :messages="$errors->get('email')" class="mt-1" />

        </div>

        <div class="flex items-center justify-end mt-5">

            <x-primary-button>
                Enviar enlace de recuperación
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>