@extends('layouts.app')

@section('content')
<div class="min-h-screen relative overflow-hidden">
    <!-- Hero Section -->
    <div class="hero-section mt-10 mb-16">
        <div class="flex-1 flex flex-col justify-center items-start gap-4">
            <h1 class="section-title gradient-text">SEA Catering: Healthy & Cute Meal Plans</h1>
            <p class="text-lg text-primarybrown mb-4">Catering sehat, enak, dan tampil menggemaskan. Pilih meal plan favoritmu, atur langganan, dan nikmati kemudahan hidup sehat!</p>
            <a href="{{ route('meal_plans') }}" class="cute-button">Lihat Meal Plans</a>
        </div>
        <div class="flex-1 flex justify-center items-center">
            <img src="/img/hero-food.png" alt="Cute Food" class="w-64 md:w-80 rounded-4xl shadow-xl food-float" />
        </div>
    </div>

    <!-- Features Section Zig-Zag -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <div class="cute-card flex flex-col items-center p-6">
            <img src="/img/feature-fresh.png" alt="Fresh" class="w-20 mb-4 food-float" />
            <h2 class="font-heading text-xl text-primarybrown mb-2">Fresh & Healthy</h2>
            <p class="text-primarybrown text-center">Bahan segar, menu seimbang, dan selalu baru setiap minggu.</p>
        </div>
        <div class="cute-card flex flex-col items-center p-6">
            <img src="/img/feature-cute.png" alt="Cute" class="w-20 mb-4 food-float" />
            <h2 class="font-heading text-xl text-primarybrown mb-2">Cute Packaging</h2>
            <p class="text-primarybrown text-center">Kemasan lucu, cocok untuk hadiah atau motivasi makan sehat.</p>
        </div>
        <div class="cute-card flex flex-col items-center p-6">
            <img src="/img/feature-easy.png" alt="Easy" class="w-20 mb-4 food-float" />
            <h2 class="font-heading text-xl text-primarybrown mb-2">Easy Subscription</h2>
            <p class="text-primarybrown text-center">Langganan mudah, atur sendiri jadwal dan preferensi kamu.</p>
        </div>
    </div>

    <!-- Contact Details Section -->
    <section class="subscription-card max-w-2xl mx-auto mt-16 text-center">
        <h2 class="section-title">Contact Us</h2>
        <div class="space-y-3">
            <p class="text-lg text-navy"><span class="font-bold">Manager:</span> Brian</p>
            <p class="text-lg text-navy"><span class="font-bold">Phone:</span> 08123456789</p>
        </div>
        <div class="mt-6">
            <a href="{{ route('contact') }}" class="btn-primary inline-block">Get in Touch</a>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="text-center mt-16 mb-8">
        <div class="card max-w-md mx-auto">
            <h3 class="text-xl font-heading text-navy mb-4">Ready to Start?</h3>
            <div class="space-y-3">
                <a href="{{ route('login') }}" class="btn-primary block w-full">Login</a>
                <a href="{{ route('register') }}" class="btn-secondary block w-full">Register</a>
            </div>
        </div>
    </section>
</div>
@endsection 