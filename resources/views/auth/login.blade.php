<x-guest-layout>
<div class="text-center mb-4">

    <img src="{{ asset('images/logo.png') }}"
         alt="SIGLAB"
         class="mx-auto w-16 h-auto">

</div>

    <div class="mb-4 text-center">

        <h2 class="text-xl font-bold text-gray-800">
            Iniciar Sesión
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Accede a tu cuenta de SIGLAB
        </p>

    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
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
                autofocus
                autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-1" />

        </div>

        <!-- Password -->
        <div class="mt-4">

           <x-input-label for="password" :value="__('Contraseña')" />

<div class="relative">

    <x-text-input
        id="password"
        class="block mt-1 w-full pr-10"
        type="password"
        name="password"
        required
        autocomplete="current-password"
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

        <!-- Remember Me -->
        

        <div class="flex items-center justify-end mt-5">

            

            <x-primary-button>
                {{ __('Iniciar sesión') }}
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