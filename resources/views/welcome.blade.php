@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-pink-50 to-blue-50 py-20 overflow-hidden">
    <!-- Blob/Gradient Decorative Shape -->
    <div class="absolute -top-24 -left-32 w-[32rem] h-[32rem] z-0 opacity-60 pointer-events-none select-none"
         aria-hidden="true">
        <svg viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
            <g transform="translate(300,300)">
                <path d="M120,-170C160,-140,200,-100,200,-60C200,-20,160,20,130,60C100,100,80,140,40,170C0,200,-40,220,-80,200C-120,180,-160,120,-180,60C-200,0,-200,-60,-170,-110C-140,-160,-80,-200,-20,-200C40,-200,80,-200,120,-170Z" fill="url(#heroGradient)" />
            </g>
            <defs>
                <linearGradient id="heroGradient" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0%" stop-color="#FF90BB" />
                    <stop offset="100%" stop-color="#8ACCD5" />
                </linearGradient>
            </defs>
        </svg>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1">
                <h1 class="text-4xl md:text-6xl font-heading text-brown mb-4 relative">
                    SEA Catering
                </h1>
                <p class="text-2xl md:text-3xl font-heading text-primary mb-6">"Healthy Meals, Anytime, Anywhere"</p>
                <p class="text-lg text-brown mb-8 leading-relaxed">
                    Kami menyediakan layanan katering sehat dengan pengiriman ke seluruh Indonesia. 
                    Nikmati makanan bergizi yang lezat dan praktis untuk gaya hidup sehat Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <x-button variant="primary" :href="route('meal_plans')" class="text-lg px-8 py-4 animate-pulse">
                        Lihat Menu
                    </x-button>
                    <x-button variant="secondary" :href="route('contact')" class="text-lg px-8 py-4">
                        Hubungi Kami
                    </x-button>
                </div>
            </div>
            <div class="flex-1 flex justify-center">
                <img src="https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=800&q=80" 
                     alt="Healthy Colorful Salad Bowl" class="w-80 md:w-96 rounded-4xl shadow-2xl transform hover:scale-105 transition-transform duration-300 object-cover" />
            </div>
        </div>
    </div>
</div>

<!-- How It Works Section -->
<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="section-title text-center gradient-text mb-16">4 Langkah Mudah Menuju Hidup Sehat</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="flex flex-col items-center text-center fade-in-up" x-data x-intersect="$el.classList.add('animate-fade-in-up')">
                <div class="w-20 h-20 flex items-center justify-center rounded-full bg-primary/20 mb-6">
                    <!-- Calendar Icon -->
                    <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="4" stroke-width="2"/><path d="M16 2v4M8 2v4M3 10h18" stroke-width="2"/></svg>
                </div>
                <h3 class="font-heading text-lg md:text-xl text-brown font-bold mb-2">1. Pilih Paket & Jadwal</h3>
                <p class="text-brown">Tentukan paket katering dan jadwal pengiriman sesuai kebutuhan Anda.</p>
            </div>
            <!-- Step 2 -->
            <div class="flex flex-col items-center text-center fade-in-up" x-data x-intersect="$el.classList.add('animate-fade-in-up')" style="animation-delay:0.1s;">
                <div class="w-20 h-20 flex items-center justify-center rounded-full bg-accent/20 mb-6">
                    <!-- Chef Icon -->
                    <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="7" r="5" stroke-width="2"/><path d="M5 21v-2a4 4 0 014-4h6a4 4 0 014 4v2" stroke-width="2"/></svg>
                </div>
                <h3 class="font-heading text-lg md:text-xl text-brown font-bold mb-2">2. Koki Kami Menyiapkan</h3>
                <p class="text-brown">Tim koki profesional kami menyiapkan makanan sehat dan lezat setiap hari.</p>
            </div>
            <!-- Step 3 -->
            <div class="flex flex-col items-center text-center fade-in-up" x-data x-intersect="$el.classList.add('animate-fade-in-up')" style="animation-delay:0.2s;">
                <div class="w-20 h-20 flex items-center justify-center rounded-full bg-secondary/30 mb-6">
                    <!-- Delivery Truck Icon -->
                    <svg class="w-10 h-10 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="1" y="7" width="15" height="13" rx="2" stroke-width="2"/><path d="M16 16h2a2 2 0 002-2v-5.5a1 1 0 00-.293-.707l-2.5-2.5A1 1 0 0016 6.5V16z" stroke-width="2"/><circle cx="5.5" cy="19.5" r="1.5" stroke-width="2"/><circle cx="18.5" cy="19.5" r="1.5" stroke-width="2"/></svg>
                </div>
                <h3 class="font-heading text-lg md:text-xl text-brown font-bold mb-2">3. Pengiriman Tepat Waktu</h3>
                <p class="text-brown">Makanan dikirim segar dan tepat waktu langsung ke depan pintu Anda.</p>
            </div>
            <!-- Step 4 -->
            <div class="flex flex-col items-center text-center fade-in-up" x-data x-intersect="$el.classList.add('animate-fade-in-up')" style="animation-delay:0.3s;">
                <div class="w-20 h-20 flex items-center justify-center rounded-full bg-primary/20 mb-6">
                    <!-- Fork & Knife Icon -->
                    <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 2v20M16 2v20M12 8v8" stroke-width="2"/><circle cx="8" cy="22" r="2" stroke-width="2"/><circle cx="16" cy="22" r="2" stroke-width="2"/></svg>
                </div>
                <h3 class="font-heading text-lg md:text-xl text-brown font-bold mb-2">4. Nikmati Makanan Lezat</h3>
                <p class="text-brown">Santap makanan sehat, nikmati hidup lebih bugar dan bahagia!</p>
            </div>
        </div>
    </div>
</div>

<!-- Featured Menu Gallery Section -->
<div class="py-20 bg-gradient-to-br from-accent/10 to-secondary/10">
    <div class="container mx-auto px-4">
        <h2 class="section-title text-center gradient-text mb-12">Intip Menu Lezat Kami Minggu Ini</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Menu 1 -->
            <div class="relative group rounded-3xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=600&q=80" alt="Salmon Panggang dengan Asparagus" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white text-xl font-heading font-bold">Salmon Panggang dengan Asparagus</span>
                </div>
            </div>
            <!-- Menu 2 -->
            <div class="relative group rounded-3xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1464306076886-debca5e8a6b0?auto=format&fit=crop&w=600&q=80" alt="Chicken Quinoa Bowl" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white text-xl font-heading font-bold">Chicken Quinoa Bowl</span>
                </div>
            </div>
            <!-- Menu 3 -->
            <div class="relative group rounded-3xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80" alt="Vegan Buddha Bowl" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white text-xl font-heading font-bold">Vegan Buddha Bowl</span>
                </div>
            </div>
            <!-- Menu 4 -->
            <div class="relative group rounded-3xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=600&q=80" alt="Grilled Chicken Caesar" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white text-xl font-heading font-bold">Grilled Chicken Caesar</span>
                </div>
            </div>
            <!-- Menu 5 -->
            <div class="relative group rounded-3xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1523987355523-c7b5b0723c6a?auto=format&fit=crop&w=600&q=80" alt="Tuna Avocado Salad" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white text-xl font-heading font-bold">Tuna Avocado Salad</span>
                </div>
            </div>
            <!-- Menu 6 -->
            <div class="relative group rounded-3xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1467003909585-2f8a72700288?auto=format&fit=crop&w=600&q=80" alt="Fruit Parfait" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <span class="text-white text-xl font-heading font-bold">Fruit Parfait</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimoni Pelanggan Section -->
<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="section-title text-center gradient-text mb-12">Apa Kata Pelanggan Setia Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimoni 1 -->
            <x-card class="flex flex-col items-center text-center p-8">
                <div class="w-16 h-16 rounded-full bg-accent flex items-center justify-center mb-4 shadow-lg">
                    <span class="text-2xl font-heading text-white">AR</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="font-heading text-brown font-bold mr-2">Andini Rahma</span>
                    <span class="flex text-primary">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                    </span>
                </div>
                <blockquote class="text-brown italic mt-2">"Makanannya selalu fresh, pengiriman tepat waktu, dan rasanya enak banget! Hidup sehat jadi lebih mudah."</blockquote>
            </x-card>
            <!-- Testimoni 2 -->
            <x-card class="flex flex-col items-center text-center p-8">
                <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center mb-4 shadow-lg">
                    <span class="text-2xl font-heading text-white">BW</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="font-heading text-brown font-bold mr-2">Budi Wijaya</span>
                    <span class="flex text-primary">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                    </span>
                </div>
                <blockquote class="text-brown italic mt-2">"SEA Catering benar-benar solusi buat saya yang sibuk. Menu variatif, porsi pas, dan pelayanan ramah!"</blockquote>
            </x-card>
            <!-- Testimoni 3 -->
            <x-card class="flex flex-col items-center text-center p-8">
                <div class="w-16 h-16 rounded-full bg-secondary flex items-center justify-center mb-4 shadow-lg">
                    <span class="text-2xl font-heading text-white">LS</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="font-heading text-brown font-bold mr-2">Lestari Sari</span>
                    <span class="flex text-primary">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                        <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,7.36 19.51,7.36 13.97,11.63 16.56,17.99 10,13.72 3.44,17.99 6.03,11.63 0.49,7.36 7.41,7.36"/></svg>
                    </span>
                </div>
                <blockquote class="text-brown italic mt-2">"Saya sudah langganan 6 bulan, berat badan turun dan badan terasa lebih fit. Highly recommended!"</blockquote>
            </x-card>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="py-20 bg-gradient-to-br from-secondary/10 to-accent/10">
    <div class="container mx-auto px-4">
        <h2 class="section-title text-center gradient-text mb-12">Pertanyaan yang Sering Diajukan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- FAQ 1 -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full text-left flex items-center justify-between bg-white rounded-2xl px-6 py-4 shadow hover:shadow-lg transition-all font-heading text-brown text-lg focus:outline-none">
                    <span>Apakah bahan-bahannya segar?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 ml-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-transition class="px-6 pt-2 pb-4 text-brown">
                    Tentu! Kami hanya menggunakan bahan-bahan segar dan berkualitas tinggi yang diproses setiap hari.
                </div>
            </div>
            <!-- FAQ 2 -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full text-left flex items-center justify-between bg-white rounded-2xl px-6 py-4 shadow hover:shadow-lg transition-all font-heading text-brown text-lg focus:outline-none">
                    <span>Bisakah request menu khusus?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 ml-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-transition class="px-6 pt-2 pb-4 text-brown">
                    Ya, Anda dapat request menu khusus sesuai kebutuhan diet atau alergi. Silakan hubungi tim kami sebelum berlangganan.
                </div>
            </div>
            <!-- FAQ 3 -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full text-left flex items-center justify-between bg-white rounded-2xl px-6 py-4 shadow hover:shadow-lg transition-all font-heading text-brown text-lg focus:outline-none">
                    <span>Area mana saja yang di-cover pengiriman?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 ml-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-transition class="px-6 pt-2 pb-4 text-brown">
                    Kami melayani pengiriman ke seluruh Indonesia, dengan jaminan makanan tetap segar sampai tujuan.
                </div>
            </div>
            <!-- FAQ 4 -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full text-left flex items-center justify-between bg-white rounded-2xl px-6 py-4 shadow hover:shadow-lg transition-all font-heading text-brown text-lg focus:outline-none">
                    <span>Bagaimana cara pembayaran langganan?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 ml-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-transition class="px-6 pt-2 pb-4 text-brown">
                    Pembayaran dapat dilakukan melalui transfer bank, e-wallet, atau kartu kredit. Semua transaksi dijamin aman.
                </div>
            </div>
            <!-- FAQ 5 -->
            <div x-data="{ open: false }" class="mb-4">
                <button @click="open = !open" class="w-full text-left flex items-center justify-between bg-white rounded-2xl px-6 py-4 shadow hover:shadow-lg transition-all font-heading text-brown text-lg focus:outline-none">
                    <span>Apakah bisa berhenti atau pause langganan?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 ml-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-transition class="px-6 pt-2 pb-4 text-brown">
                    Tentu, Anda bisa mengatur jeda (pause) atau berhenti langganan kapan saja melalui dashboard pelanggan.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Final Call to Action Section -->
<div class="py-20 bg-gradient-to-r from-primary to-secondary flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-heading font-bold text-white mb-6 drop-shadow-lg">Siap Memulai Perjalanan Sehatmu Hari Ini?</h2>
            <p class="text-lg md:text-xl text-white/90 mb-10">Jangan tunda lagi, pilih paket langganan terbaik dan rasakan perubahan positif untuk hidupmu. Tim kami siap menemani perjalanan sehatmu!</p>
            <x-button variant="accent" :href="route('meal_plans')" class="text-xl px-12 py-5 font-bold shadow-3xl animate-bounce-gentle">
                Pilih Paket Langgananmu Sekarang
            </x-button>
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
                        <p class="text-brown">Manager</p>
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