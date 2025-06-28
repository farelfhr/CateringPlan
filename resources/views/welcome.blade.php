@extends('layouts.app')

@section('content')
<div class="container mx-auto py-16">
    <div class="flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1">
            <h1 class="text-4xl md:text-5xl font-heading text-brown mb-6">SEA Catering</h1>
            <p class="text-lg text-brown mb-8">Catering sehat, enak, dan tampil menggemaskan. Pilih meal plan favoritmu, atur langganan, dan nikmati kemudahan hidup sehat!</p>
            <x-button variant="primary" :href="route('meal_plans')">Lihat Meal Plans</x-button>
        </div>
        <div class="flex-1 flex justify-center">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" alt="Cute Food" class="w-64 md:w-80 rounded-4xl shadow-xl" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
        <x-card>
            <img src="https://images.unsplash.com/photo-1464306076886-debca5e8a6b0?auto=format&fit=crop&w=200&q=80" alt="Fresh" class="w-20 mb-4 mx-auto" />
            <h2 class="font-heading text-xl text-brown mb-2 text-center">Fresh & Healthy</h2>
            <p class="text-brown text-center">Bahan segar, menu seimbang, dan selalu baru setiap minggu.</p>
        </x-card>
        <x-card>
            <img src="https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=200&q=80" alt="Cute" class="w-20 mb-4 mx-auto" />
            <h2 class="font-heading text-xl text-brown mb-2 text-center">Cute Packaging</h2>
            <p class="text-brown text-center">Kemasan lucu, cocok untuk hadiah atau motivasi makan sehat.</p>
        </x-card>
        <x-card>
            <img src="https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=200&q=80" alt="Easy" class="w-20 mb-4 mx-auto" />
            <h2 class="font-heading text-xl text-brown mb-2 text-center">Easy Subscription</h2>
            <p class="text-brown text-center">Langganan mudah, atur sendiri jadwal dan preferensi kamu.</p>
        </x-card>
    </div>
</div>
@endsection 