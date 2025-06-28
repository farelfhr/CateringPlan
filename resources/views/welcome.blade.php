@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-pink-50 to-blue-50 py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1">
                <h1 class="text-4xl md:text-6xl font-heading text-brown mb-4">SEA Catering</h1>
                <p class="text-2xl md:text-3xl font-heading text-pink-400 mb-6">"Healthy Meals, Anytime, Anywhere"</p>
                <p class="text-lg text-brown mb-8 leading-relaxed">
                    Kami menyediakan layanan katering sehat dengan pengiriman ke seluruh Indonesia. 
                    Nikmati makanan bergizi yang lezat dan praktis untuk gaya hidup sehat Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <x-button variant="primary" :href="route('meal_plans')" class="text-lg px-8 py-4">
                        Lihat Menu
                    </x-button>
                    <x-button variant="secondary" :href="route('contact')" class="text-lg px-8 py-4">
                        Hubungi Kami
                    </x-button>
                </div>
            </div>
            <div class="flex-1 flex justify-center">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=500&q=80" 
                     alt="Healthy Food" class="w-80 md:w-96 rounded-4xl shadow-2xl transform hover:scale-105 transition-transform duration-300" />
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-heading text-brown text-center mb-12">Fitur Unggulan Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <x-card class="text-center hover:shadow-xl transition-shadow duration-300">
                <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                    </svg>
                </div>
                <h3 class="font-heading text-xl text-brown mb-4">Kustomisasi Makanan</h3>
                <p class="text-brown">Pilih menu sesuai preferensi dan kebutuhan diet Anda. Vegetarian, vegan, atau low-carb, semua tersedia.</p>
            </x-card>
            <x-card class="text-center hover:shadow-xl transition-shadow duration-300">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="font-heading text-xl text-brown mb-4">Pengiriman Cepat</h3>
                <p class="text-brown">Pengiriman tepat waktu ke seluruh Indonesia dengan kemasan yang menjaga kesegaran makanan.</p>
            </x-card>
            <x-card class="text-center hover:shadow-xl transition-shadow duration-300">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-heading text-xl text-brown mb-4">Informasi Nutrisi</h3>
                <p class="text-brown">Setiap menu dilengkapi dengan informasi nutrisi lengkap untuk membantu Anda mencapai tujuan kesehatan.</p>
            </x-card>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="py-20 bg-gradient-to-br from-blue-50 to-pink-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-heading text-brown mb-8">Tentang SEA Catering</h2>
            <p class="text-lg text-brown leading-relaxed mb-12">
                SEA Catering adalah penyedia layanan katering sehat terpercaya yang berkomitmen menghadirkan makanan bergizi 
                dengan cita rasa lezat. Dengan pengalaman bertahun-tahun, kami telah melayani ribuan pelanggan di seluruh Indonesia 
                dan terus berinovasi untuk memberikan pengalaman terbaik dalam hal makanan sehat.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h3 class="font-heading text-xl text-brown mb-4">Misi Kami</h3>
                    <p class="text-brown">Membantu masyarakat Indonesia hidup lebih sehat melalui makanan bergizi yang mudah diakses dan lezat.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h3 class="font-heading text-xl text-brown mb-4">Visi Kami</h3>
                    <p class="text-brown">Menjadi penyedia layanan katering sehat terdepan di Indonesia dengan standar kualitas tertinggi.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Info Section -->
<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-heading text-brown mb-8">Hubungi Kami</h2>
            <div class="bg-gradient-to-r from-pink-50 to-blue-50 rounded-2xl p-8 shadow-lg">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="text-left">
                        <h3 class="font-heading text-xl text-brown">Manajer Brian</h3>
                        <p class="text-brown">Customer Service Manager</p>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <div class="text-left">
                        <h3 class="font-heading text-xl text-brown">08123456789</h3>
                        <p class="text-brown">Siap melayani 24/7</p>
                    </div>
                </div>
                <div class="mt-8">
                    <x-button variant="primary" :href="route('contact')" class="w-full md:w-auto">
                        Kirim Pesan
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 