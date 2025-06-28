@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8 relative overflow-hidden">
    <!-- Floating decorative elements -->
    <div class="floating-heart top-20 left-20 text-3xl">💝</div>
    <div class="floating-heart top-40 right-20 text-2xl" style="animation-delay: 1s;">🌸</div>
    <div class="floating-heart bottom-40 left-20 text-2xl" style="animation-delay: 2s;">✨</div>
    <div class="floating-heart bottom-20 right-40 text-3xl" style="animation-delay: 0.5s;">🎉</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="cute-icon mb-4">🌟</div>
            <h1 class="section-title gradient-text">Subscription Plans 💝</h1>
            <p class="section-subtitle">
                Choose a subscription plan that fits your lifestyle and dietary needs! 🍽️
            </p>
            
            <div class="subscription-card max-w-2xl mx-auto relative">
                <div class="cute-icon absolute -top-3 -right-3">🎊</div>
                <div class="cute-icon mb-4">🚀</div>
                <h2 class="text-2xl font-bold text-pink-pastel-700 mb-4">Coming Soon! ✨</h2>
                <p class="text-pink-pastel-600 mb-6">
                    We're cooking up something amazing for you! Our subscription features will be available soon with exclusive benefits and special member perks! 💕
                </p>
                
                <!-- Preview of upcoming features -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="feature-card text-center">
                        <div class="cute-icon mb-2">🎯</div>
                        <h3 class="font-semibold text-pink-pastel-700">Personalized Plans</h3>
                        <p class="text-xs text-pink-pastel-600">Tailored to your preferences</p>
                    </div>
                    <div class="feature-card text-center">
                        <div class="cute-icon mb-2">💰</div>
                        <h3 class="font-semibold text-pink-pastel-700">Member Discounts</h3>
                        <p class="text-xs text-pink-pastel-600">Exclusive pricing for subscribers</p>
                    </div>
                    <div class="feature-card text-center">
                        <div class="cute-icon mb-2">📅</div>
                        <h3 class="font-semibold text-pink-pastel-700">Flexible Scheduling</h3>
                        <p class="text-xs text-pink-pastel-600">Pause or modify anytime</p>
                    </div>
                    <div class="feature-card text-center">
                        <div class="cute-icon mb-2">🎁</div>
                        <h3 class="font-semibold text-pink-pastel-700">Bonus Perks</h3>
                        <p class="text-xs text-pink-pastel-600">Free treats and surprises</p>
                    </div>
                </div>
                
                <a href="{{ route('home') }}" class="btn-primary">
                    Back to Home 💖
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 