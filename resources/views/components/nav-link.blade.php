@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-200 border-l-4 border-green-500'
            : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
