@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-blue-300 focus:bg-gray-300 hover:text-white focus:text-white';

    //if the var active has changed to true you can add it to the classes var otherwise dont add
    if ($active) $classes .= ' bg-blue-500 text-white';
@endphp

<a {{ $attributes(['class' => $classes ]) }}>
    {{ $slot }}
</a>