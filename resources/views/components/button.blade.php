@props([
    'variant' => 'primary', // primary, secondary, accent, danger
    'type' => 'button',
    'href' => null,
])

@php
    $base = 'inline-flex items-center justify-center font-semibold rounded-full transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';
    $variants = [
        'primary' => 'bg-primary text-white hover:bg-secondary shadow-lg',
        'secondary' => 'bg-secondary text-brown hover:bg-primary shadow',
        'accent' => 'bg-accent text-brown hover:bg-primary shadow',
        'danger' => 'bg-red-500 text-white hover:bg-red-600 shadow-lg',
    ];
@endphp

@if($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => "$base {$variants[$variant]} px-6 py-3"]) }}>
    {{ $slot }}
</a>
@else
<button type="{{ $type }}" {{ $attributes->merge(['class' => "$base {$variants[$variant]} px-6 py-3"]) }}>
    {{ $slot }}
</button>
@endif
