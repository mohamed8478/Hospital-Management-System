@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm font-semibold text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
