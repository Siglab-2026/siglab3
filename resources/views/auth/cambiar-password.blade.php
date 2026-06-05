<x-app-layout>

<div class="max-w-xl mx-auto py-6">

    <div class="bg-white shadow-sm rounded-xl p-6">

        <h2 class="text-xl font-bold text-gray-800 mb-2">
            🔑 Cambiar contraseña
        </h2>

        <p class="text-sm text-gray-500 mb-5">
            Actualiza tu contraseña de acceso a SIGLAB.
        </p>

        <form method="POST" action="{{ route('password.change.update') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="current_password" :value="__('Contraseña actual')" />

                <div class="relative">
                    <x-text-input
                        id="current_password"
                        class="block mt-1 w-full pr-10"
                        type="password"
                        name="current_password"
                        required
                        autocomplete="current-password"
                    />

                    <button type="button"
                            onclick="togglePassword('current_password', 'icon-current-password')"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-cyan-600">
                        <i id="icon-current-password" class="fa-solid fa-eye"></i>
                    </button>
                </div>

                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" :value="__('Nueva contraseña')" />

                <div class="relative">
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full pr-10"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    />

                    <button type="button"
                            onclick="togglePassword('password', 'icon-password')"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-cyan-600">
                        <i id="icon-password" class="fa-solid fa-eye"></i>
                    </button>
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-5">
                <x-input-label for="password_confirmation" :value="__('Confirmar nueva contraseña')" />

                <div class="relative">
                    <x-text-input
                        id="password_confirmation"
                        class="block mt-1 w-full pr-10"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <button type="button"
                            onclick="togglePassword('password_confirmation', 'icon-password-confirm')"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-cyan-600">
                        <i id="icon-password-confirm" class="fa-solid fa-eye"></i>
                    </button>
                </div>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <x-primary-button>
                    Guardar cambios
                </x-primary-button>
            </div>

        </form>

    </div>

</div>

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

</x-app-layout>