<x-guest-layout>

     <div class="mb-6 text-center">

        <img
            src="{{ asset('images/logo.png') }}"
            alt="SIGLAB"
            class="mx-auto mb-3"
            style="width:80px;">

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

        <!-- CONTRASEÑA -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Contraseña')" />

            <div class="relative">

                <x-text-input
                    id="password"
                    class="block mt-1 w-full pr-10"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />

                <button
                    type="button"
                    onclick="togglePassword('password', 'icon-password')"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-cyan-600">

                    <i id="icon-password" class="fa-solid fa-eye"></i>

                </button>

            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- CONFIRMAR CONTRASEÑA -->
        <div class="mt-3">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <div class="relative">

                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full pr-10"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <button
                    type="button"
                    onclick="togglePassword('password_confirmation', 'icon-password-confirm')"
                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-cyan-600">

                    <i id="icon-password-confirm" class="fa-solid fa-eye"></i>

                </button>

            </div>

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

    <script>
        function togglePassword(inputId, iconId) {

            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {

                input.type = 'text';

                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');

            } else {

                input.type = 'password';

                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');

            }

        }
    </script>

</x-guest-layout>