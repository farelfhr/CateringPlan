@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-gradient-to-br from-pink-50 to-blue-50 py-16 mb-12 fade-in-up" x-data x-intersect="$el.classList.add('animate-fade-in-up')">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-bold text-brown mb-4">Kami Selalu Ada Untuk Anda</h1>
        <h2 class="text-lg md:text-2xl text-brown/80 max-w-2xl mx-auto">Punya pertanyaan, saran, atau testimoni? Sampaikan kepada kami!</h2>
    </div>
</div>

<!-- Pesan dari Manager -->
<div class="container mx-auto px-4 mb-16 fade-in-up" x-data x-intersect="$el.classList.add('animate-fade-in-up')">
    <div class="bg-white rounded-3xl shadow-lg p-8 md:p-12 flex flex-col md:flex-row items-center gap-8">
        <div class="flex-shrink-0 flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-primary to-accent overflow-hidden">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Manajer Brian" class="w-24 h-24 object-cover rounded-full border-4 border-white shadow" />
        </div>
        <div>
            <h3 class="font-heading text-2xl text-brown font-bold mb-1">Manajer Brian</h3>
            <p class="text-brown mb-2">Manager, SEA Catering</p>
            <blockquote class="italic text-brown/80">"Kepuasan dan kesehatan Anda adalah detak jantung dari bisnis kami. Saya dan tim selalu siap mendengarkan dan melayani Anda dengan sepenuh hati."</blockquote>
        </div>
    </div>
</div>

<!-- Grid 3 Kolom Utama -->
<div class="container mx-auto px-4 mb-16 fade-in-up" x-data x-intersect="$el.classList.add('animate-fade-in-up')">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Kolom 1: Formulir Kontak -->
        <div class="bg-white rounded-3xl shadow-lg p-8 flex flex-col h-full">
            <h2 class="font-heading text-xl text-brown font-bold mb-6">Tinggalkan Pesan</h2>
            <form method="POST" action="{{ route('testimonials.store') }}" class="space-y-6 flex-1 flex flex-col justify-between" x-data="{ rating: 0, hoverRating: 0 }">
                @csrf
                <div>
                    <x-label for="name">Nama Anda</x-label>
                    <x-input name="name" placeholder="Masukkan nama Anda" required />
                </div>
                <div>
                    <x-label for="review">Pesan / Testimoni</x-label>
                    <textarea id="review" name="review" class="w-full bg-white/80 border-2 border-primary/30 rounded-2xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none" rows="4" placeholder="Tulis pesan atau testimoni Anda..." required>{{ old('review') }}</textarea>
                </div>
                <div>
                    <x-label>Rating</x-label>
                    <div class="flex items-center space-x-1 mt-2">
                        <template x-for="star in 5" :key="star">
                            <button type="button" 
                                    @click="rating = star" 
                                    @mouseenter="hoverRating = star" 
                                    @mouseleave="hoverRating = 0"
                                    class="text-3xl transition-colors duration-200"
                                    :class="{
                                        'text-yellow-400': star <= (hoverRating || rating),
                                        'text-gray-300': star > (hoverRating || rating)
                                    }">
                                ★
                            </button>
                        </template>
                        <span class="text-brown ml-3 font-semibold" x-show="rating > 0" x-text="`(${rating}/5)`"></span>
                    </div>
                    <input type="hidden" name="rating" x-model="rating" required />
                </div>
                <x-button type="submit" variant="primary" class="w-full text-lg py-4">Kirim Pesan</x-button>
            </form>
        </div>
        <!-- Kolom 2: Kontak Langsung -->
        <div class="flex flex-col gap-8 h-full">
            <div class="bg-white rounded-3xl shadow-lg p-8 flex-1 flex flex-col items-center">
                <h2 class="font-heading text-xl text-brown font-bold mb-6">Hubungi Kami Kapan Saja</h2>
                <!-- Telepon/WA -->
                <div class="w-full mb-6">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <div class="font-heading text-brown font-bold text-lg">08123456789</div>
                        </div>
                    </div>
                    <a href="https://wa.me/628123456789" target="_blank" class="btn-primary w-full block text-center mt-2">Chat di WhatsApp</a>
                </div>
                <!-- Email -->
                <div class="w-full">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <div class="font-heading text-brown font-bold text-lg">info@seacatering.com</div>
                        </div>
                    </div>
                    <a href="mailto:info@seacatering.com" class="btn-secondary w-full block text-center mt-2">Kirim Email</a>
                </div>
            </div>
        </div>
        <!-- Kolom 3: Media Sosial -->
        <div class="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center h-full">
            <h2 class="font-heading text-xl text-brown font-bold mb-6">Ikuti Kami</h2>
            <div class="flex gap-6 justify-center mt-4">
                <a href="https://instagram.com/seacatering.id" target="_blank" class="hover:scale-110 transition-transform">
                    <svg class="w-12 h-12 text-pink-400" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5zm4.25 3.25a5.25 5.25 0 1 1-5.25 5.25a5.25 5.25 0 0 1 5.25-5.25zm0 1.5a3.75 3.75 0 1 0 3.75 3.75a3.75 3.75 0 0 0-3.75-3.75zm6.25.75a1 1 0 1 1-2 0a1 1 0 0 1 2 0z"/></svg>
                </a>
                <a href="https://facebook.com/seacatering.id" target="_blank" class="hover:scale-110 transition-transform">
                    <svg class="w-12 h-12 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.877v-6.987h-2.54v-2.89h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89c1.094 0 2.238.195 2.238.195v2.46h-1.261c-1.243 0-1.632.771-1.632 1.562v1.875h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 16.991 22 12z"/></svg>
                </a>
                <a href="https://tiktok.com/@seacatering.id" target="_blank" class="hover:scale-110 transition-transform">
                    <svg class="w-12 h-12 text-black" fill="currentColor" viewBox="0 0 24 24"><path d="M12.5 2h2v7.5a3.5 3.5 0 0 0 3.5 3.5h2V16a6.5 6.5 0 1 1-8.5-6.32V14a2.5 2.5 0 1 0 2 2.45V2z"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Section Peta Lokasi -->
<div class="container mx-auto px-4 mb-16 fade-in-up" x-data x-intersect="$el.classList.add('animate-fade-in-up')">
    <h2 class="font-heading text-2xl text-brown font-bold mb-6 text-center">Temukan Kantor Pusat Kami</h2>
    <div class="rounded-3xl overflow-hidden shadow-lg max-w-3xl mx-auto">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.339857727476!2d106.8192953153707!3d-6.211544995498998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e7e2b0b0b1%3A0x2c0b0b0b0b0b0b0b!2sJakarta!5e0!3m2!1sen!2sid!4v1680000000000!5m2!1sen!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<!-- Section Testimoni Carousel -->
<div class="container mx-auto px-4 mb-16 fade-in-up" x-data="{ currentSlide: 0, rating: 0, hoverRating: 0, testimonials: {{ $testimonials->toJson() }} }" x-intersect="$el.classList.add('animate-fade-in-up')">
    <h2 class="text-3xl font-heading text-brown text-center mb-8">Testimoni Sea Catering</h2>
    <div class="relative max-w-4xl mx-auto">
        <div class="overflow-hidden rounded-3xl bg-gradient-to-r from-pink-50 to-blue-50">
            <div class="flex transition-transform duration-500 ease-in-out" :style="`transform: translateX(-${currentSlide * 100}%)`">
                <template x-for="(testimonial, index) in testimonials" :key="index">
                    <div class="w-full flex-shrink-0 p-8 md:p-12">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-pink-400 to-blue-400 rounded-full flex items-center justify-center mx-auto mb-6">
                                <span class="text-white text-2xl font-bold" x-text="testimonial.name.charAt(0).toUpperCase()"></span>
                            </div>
                            <div class="flex justify-center space-x-1 mb-6">
                                <template x-for="star in 5" :key="star">
                                    <svg class="w-6 h-6" :class="star <= testimonial.rating ? 'text-yellow-400' : 'text-gray-300'" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </template>
                            </div>
                            <div class="relative mb-6">
                                <svg class="w-12 h-12 text-pink-200 absolute -top-6 -left-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                                <p class="text-lg text-brown leading-relaxed italic" x-text="testimonial.review"></p>
                            </div>
                            <div>
                                <h4 class="font-heading text-xl text-brown font-semibold" x-text="testimonial.name"></h4>
                                <p class="text-brown">Pelanggan Setia</p>
                            </div>
                        </div>
                    </div>
                </template>
                <div x-show="testimonials.length === 0" class="w-full flex-shrink-0 p-8 md:p-12">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-pink-400 to-blue-400 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl">🌟</span>
                        </div>
                        <p class="text-lg text-brown italic mb-6">"Belum ada testimoni saat ini. Jadilah yang pertama untuk berbagi pengalaman Anda!"</p>
                        <p class="text-brown">- Tim SEA Catering</p>
                    </div>
                </div>
            </div>
        </div>
        <template x-if="testimonials.length > 1">
            <div>
                <button @click="currentSlide = currentSlide > 0 ? currentSlide - 1 : testimonials.length - 1" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/80 rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-colors duration-300">
                    <svg class="w-6 h-6 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="currentSlide = currentSlide < testimonials.length - 1 ? currentSlide + 1 : 0" class="absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/80 rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-colors duration-300">
                    <svg class="w-6 h-6 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </template>
    </div>
</div>
@endsection 