<x-guest-layout>

    <div class="mb-4 text-center">
        <h2 class="text-xl font-bold text-gray-800">
            Registro de Usuario
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Crea tu cuenta para acceder a SIGLAB
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text"
                name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <div class="mt-3">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email"
                name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="mt-3">
            <x-input-label for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text"
                name="direccion" :value="old('direccion')" required />
            <x-input-error :messages="$errors->get('direccion')" class="mt-1" />
        </div>

        <div class="mt-3">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text"
                name="telefono" :value="old('telefono')" required />
            <x-input-error :messages="$errors->get('telefono')" class="mt-1" />
        </div>

        <div class="mt-3">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="mt-3">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="flex items-center justify-between mt-5 w-full">

            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                ¿Ya estás registrado?
            </a>

            <x-primary-button>
                {{ __('Registrarse') }}
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>