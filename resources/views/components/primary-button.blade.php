<button {{ $attributes->merge(['type' => 'submit', 'class' => 'cute-button']) }}>
    {{ $slot }}
</button>
