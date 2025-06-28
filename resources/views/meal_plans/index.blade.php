@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-heading text-brown mb-8 text-center">Pilih Meal Plan Favoritmu</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($mealPlans as $plan)
            <x-card class="flex flex-col items-center">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=200&q=80" alt="{{ $plan->name }}" class="w-32 h-32 object-cover rounded-2xl mb-4" />
                <h2 class="font-heading text-lg text-brown mb-2">{{ $plan->name }}</h2>
                <p class="text-brown text-center mb-2">{{ $plan->description }}</p>
                <div class="text-brown font-bold text-xl mb-4">Rp{{ number_format($plan->price,0,',','.') }}</div>
                <x-button :href="route('subscription', ['plan' => $plan->id])" variant="primary" class="w-full text-center">Langganan</x-button>
            </x-card>
        @endforeach
    </div>
</div>
@endsection 