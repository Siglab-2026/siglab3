<x-mail::message>

{{-- LOGO --}}
<div style="text-align: center; margin-bottom: 20px;">
       <img src="{{ url('images/logo.png') }}" width="120" alt="SIGLAB">
</div>

# ¡Bienvenido a SIGLAB!

Hola {{ $user->name ?? '' }},

Gracias por registrarte en nuestro sistema.

Por favor confirma tu correo electrónico haciendo clic en el botón de abajo:

<x-mail::button :url="$url">
Verificar correo electrónico
</x-mail::button>

Si no creaste esta cuenta, puedes ignorar este mensaje.

Saludos,<br>
<strong>Equipo SIGLAB</strong>

</x-mail::message>