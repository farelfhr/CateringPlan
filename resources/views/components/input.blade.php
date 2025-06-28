@props(['type' => 'text', 'name', 'id' => null, 'value' => '', 'required' => false, 'placeholder' => ''])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id ?? $name }}"
    value="{{ old($name, $value) }}"
    {{ $required ? 'required' : '' }}
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'w-full bg-white/80 border-2 border-primary/30 rounded-full px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all']) }}
/> 