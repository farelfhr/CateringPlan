@props(['for' => null])

<label @if($for) for="{{ $for }}" @endif {{ $attributes->merge(['class' => 'block text-sm font-bold text-brown mb-2']) }}>
    {{ $slot }}
</label> 