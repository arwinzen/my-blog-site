{{-- default value for props--}}
@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-5 hover:bg-blue-300 focus:bg-blue-300 hover:text-white focus:text-white';
    // add active style to current selected category
    if ($active) $classes .= ' bg-blue-300 text-white';

@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
