@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 border-b-2 border-white text-white font-medium transition'
            : 'inline-flex items-center px-3 py-2 border-b-2 border-transparent text-white hover:border-white hover:text-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>