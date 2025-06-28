@extends('layouts.app')

@section('content')
<div class="min-h-screen relative overflow-hidden">
    <!-- Hero Section -->
    <header class="hero-section max-w-7xl mx-auto py-16 px-8">
        <div class="md:w-1/2 text-center md:text-left">
            <h1 class="section-title gradient-text text-shadow mb-4">SEA Catering</h1>
            <p class="section-subtitle mb-6">Healthy Meals, Anytime, Anywhere</p>
            <a href="{{ route('meal_plans') }}" class="btn-primary">Lihat Menu</a>
        </div>
        <div class="md:w-1/2 flex justify-center mt-8 md:mt-0">
            <img src="/img/hero-illustration.svg" alt="Healthy Food" class="w-80 h-auto">
        </div>
    </header>

    <!-- Features Section Zig-Zag -->
    <section class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto mt-16">
        <div class="feature-card flex flex-col items-center">
            <img src="/img/customize.svg" class="w-16 mb-4" alt="">
            <h3 class="font-heading text-lg text-navy mb-2">Customizable</h3>
            <p class="text-body text-navy">Pilih menu sesuai selera & kebutuhanmu.</p>
        </div>
        <div class="feature-card flex flex-col items-center">
            <img src="/img/delivery.svg" class="w-16 mb-4" alt="">
            <h3 class="font-heading text-lg text-navy mb-2">Nationwide Delivery</h3>
            <p class="text-body text-navy">Pengiriman ke kota-kota besar di Indonesia.</p>
        </div>
        <div class="feature-card flex flex-col items-center">
            <img src="/img/nutrition.svg" class="w-16 mb-4" alt="">
            <h3 class="font-heading text-lg text-navy mb-2">Nutrition Info</h3>
            <p class="text-body text-navy">Informasi nutrisi lengkap di setiap paket.</p>
        </div>
    </section>

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