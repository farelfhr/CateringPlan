@props(['href', 'active' => false])

<a href="{{ $href }}"
   {{ $attributes->merge([
        'class' => ($active
            ? 'text-primary font-bold bg-secondary rounded-full px-4 py-2'
            : 'text-brown hover:text-primary transition-colors px-4 py-2'
        ) . ' nav-link'
    ]) }}>
    {{ $slot }}
</a>
