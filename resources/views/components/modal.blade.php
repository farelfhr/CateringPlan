@props(['show' => false, 'maxWidth' => '2xl'])

@if ($show)
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
    <div class="bg-white rounded-4xl shadow-xl p-8 max-w-{{ $maxWidth }} w-full">
        {{ $slot }}
    </div>
</div>
@endif
