<button 
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center px-4 py-2 rounded-md font-semibold text-sm text-white tracking-widest transition duration-200'
    ]) }}
    style="background-color:#00bcd4;"
    onmouseover="this.style.backgroundColor='#0097a7'"
    onmouseout="this.style.backgroundColor='#00bcd4'"
>
    {{ $slot }}
</button>


