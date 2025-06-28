@props(['for'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block text-sm font-bold text-brown mb-2']) }}>
    {{ $slot }}
</label> 