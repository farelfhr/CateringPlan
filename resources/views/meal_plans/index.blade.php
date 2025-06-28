@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="section-title gradient-text">Pilih Meal Plan Favoritmu</h1>
            <p class="section-subtitle">Pilih paket makanan sehat favoritmu!</p>
        </div>

        <!-- Meal Plans Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            @foreach($mealPlans as $plan)
                <div class="meal-card flex flex-col items-center">
                    <img src="/img/meal-{{ $plan->id }}.png" alt="{{ $plan->name }}" class="w-32 h-32 object-cover rounded-2xl mb-4 food-float" />
                    <h2 class="font-heading text-lg text-primarybrown mb-2">{{ $plan->name }}</h2>
                    <p class="text-primarybrown text-center mb-2">{{ $plan->description }}</p>
                    <div class="text-primarybrown font-bold text-xl mb-4">Rp{{ number_format($plan->price,0,',','.') }}</div>
                    <a href="{{ route('subscription', ['plan' => $plan->id]) }}" class="cute-button w-full text-center">Langganan</a>
                </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-16">
            <div class="subscription-card max-w-2xl mx-auto">
                <h2 class="section-title">Ready to Start Your Healthy Journey?</h2>
                <p class="section-subtitle mb-6">Hubungi kami untuk konsultasi menu atau langsung berlangganan!</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="btn-primary">Contact Us</a>
                    <a href="{{ route('subscription') }}" class="btn-secondary">View Subscriptions</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 