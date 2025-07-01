@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4" x-data="{ 
    currentSlide: 0,
    rating: 0,
    hoverRating: 0,
    testimonials: {!! $testimonials->map(function($t) {
        return [
            'customer_name' => $t->customer_name ?? $t->name,
            'review_message' => $t->review_message ?? $t->review,
            'rating' => $t->rating,
        ];
    })->toJson() !!}
}">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-heading text-brown mb-4">Hubungi Kami</h1>
            <p class="text-lg text-brown max-w-2xl mx-auto">
                Kami siap melayani pertanyaan dan saran Anda. Jangan ragu untuk menghubungi kami!
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div>
                <x-card class="h-fit">
                    <h2 class="text-2xl font-heading text-brown mb-6 text-center">Informasi Kontak</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-pink-50 to-blue-50 rounded-2xl">
                            <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-heading text-lg text-brown">Manajer Brian</h3>
                                <p class="text-brown">Customer Service Manager</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-blue-50 to-pink-50 rounded-2xl">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-heading text-lg text-brown">08123456789</h3>
                                <p class="text-brown">Siap melayani 24/7</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-green-50 to-blue-50 rounded-2xl">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-heading text-lg text-brown">info@seacatering.com</h3>
                                <p class="text-brown">Email kami kapan saja</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-yellow-50 to-pink-50 rounded-2xl">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-heading text-lg text-brown">Jakarta, Indonesia</h3>
                                <p class="text-brown">Pengiriman ke seluruh Indonesia</p>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>

            <!-- Testimonial Form -->
            <div>
                <x-card>
                    <h2 class="text-2xl font-heading text-brown mb-6 text-center">Bagikan Pengalaman Anda</h2>
                    
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 rounded-2xl p-4">
                            <div class="flex items-center mb-3">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <h3 class="text-green-800 font-medium">Berhasil!</h3>
                            </div>
                            <p class="text-green-700 text-sm">{{ session('success') }}</p>
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-4">
                            <div class="flex items-center mb-3">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="text-red-800 font-medium">Terjadi kesalahan:</h3>
                            </div>
                            <ul class="text-red-700 text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('testimonials.store') }}" class="space-y-6">
                        @csrf
                        
                        <div>
                            <x-label for="name">Nama Anda</x-label>
                            <x-input name="name" placeholder="Masukkan nama Anda" required />
                        </div>
                        
                        <div>
                            <x-label for="review">Review Anda</x-label>
                            <textarea id="review" name="review" 
                                      class="w-full bg-white/80 border-2 border-primary/30 rounded-2xl px-4 py-3 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none" 
                                      rows="4" 
                                      placeholder="Ceritakan pengalaman Anda dengan SEA Catering..." 
                                      required>{{ old('review') }}</textarea>
                        </div>
                        
                        <div>
                            <x-label>Rating</x-label>
                            <div class="flex items-center space-x-2 mt-2">
                                <template x-for="star in 5" :key="star">
                                    <button type="button" 
                                            @click="rating = star" 
                                            @mouseenter="hoverRating = star" 
                                            @mouseleave="hoverRating = 0"
                                            class="text-2xl transition-colors duration-200"
                                            :class="{
                                                'text-yellow-400': star <= (hoverRating || rating),
                                                'text-gray-300': star > (hoverRating || rating)
                                            }">
                                        ★
                                    </button>
                                </template>
                                <span class="text-brown ml-2" x-text="rating ? `(${rating}/5)` : ''"></span>
                            </div>
                            <input type="hidden" name="rating" x-model="rating" required />
                        </div>
                        
                        <x-button type="submit" variant="primary" class="w-full text-lg py-4">
                            Kirim Testimoni
                        </x-button>
                    </form>
                </x-card>
            </div>
        </div>

        <!-- Testimonials Carousel -->
        <div class="mt-16">
            <h2 class="text-3xl font-heading text-brown text-center mb-8">Apa Kata Pelanggan Kami</h2>
            
            <div class="relative max-w-4xl mx-auto">
                <!-- Carousel Container -->
                <div class="overflow-hidden rounded-3xl bg-gradient-to-r from-pink-50 to-blue-50">
                    <div class="flex transition-transform duration-500 ease-in-out" 
                         :style="`transform: translateX(-${currentSlide * 100}%)`">
                        
                        <template x-for="(testimonial, index) in testimonials" :key="index">
                            <div class="w-full flex-shrink-0 p-8 md:p-12">
                                <div class="text-center">
                                    <!-- Avatar -->
                                    <div class="w-20 h-20 bg-gradient-to-br from-pink-400 to-blue-400 rounded-full flex items-center justify-center mx-auto mb-6">
                                        <span class="text-white text-2xl font-bold" x-text="testimonial.customer_name.charAt(0).toUpperCase()"></span>
                                    </div>
                                    
                                    <!-- Rating -->
                                    <div class="flex justify-center space-x-1 mb-6">
                                        <template x-for="star in 5" :key="star">
                                            <svg class="w-6 h-6" :class="star <= testimonial.rating ? 'text-yellow-400' : 'text-gray-300'" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </template>
                                    </div>
                                    
                                    <!-- Quote -->
                                    <div class="relative mb-6">
                                        <svg class="w-12 h-12 text-pink-200 absolute -top-6 -left-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                        <p class="text-lg text-brown leading-relaxed italic" x-text="testimonial.review_message"></p>
                                    </div>
                                    
                                    <!-- Author -->
                                    <div>
                                        <h4 class="font-heading text-xl text-brown font-semibold" x-text="testimonial.customer_name"></h4>
                                        <p class="text-brown">Pelanggan Setia</p>
                                    </div>
                                </div>
                            </div>
                        </template>
                        
                        <!-- Default testimonial if none exist -->
                        <div x-show="testimonials.length === 0" class="w-full flex-shrink-0 p-8 md:p-12">
                            <div class="text-center">
                                <div class="w-20 h-20 bg-gradient-to-br from-pink-400 to-blue-400 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <span class="text-white text-2xl">🌟</span>
                                </div>
                                <p class="text-lg text-brown italic mb-6">
                                    "Belum ada testimoni saat ini. Jadilah yang pertama untuk berbagi pengalaman Anda!"
                                </p>
                                <p class="text-brown">- Tim SEA Catering</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Buttons -->
                <template x-if="testimonials.length > 1">
                    <div>
                        <button @click="currentSlide = currentSlide > 0 ? currentSlide - 1 : testimonials.length - 1" 
                                class="absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/80 rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-colors duration-300">
                            <svg class="w-6 h-6 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        
                        <button @click="currentSlide = currentSlide < testimonials.length - 1 ? currentSlide + 1 : 0" 
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/80 rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-colors duration-300">
                            <svg class="w-6 h-6 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </template>
                
                <!-- Dots Indicator -->
                <template x-if="testimonials.length > 1">
                    <div class="flex justify-center space-x-2 mt-6">
                        <template x-for="(testimonial, index) in testimonials" :key="index">
                            <button @click="currentSlide = index" 
                                    class="w-3 h-3 rounded-full transition-colors duration-300"
                                    :class="currentSlide === index ? 'bg-pink-400' : 'bg-gray-300'">
                            </button>
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-advance carousel
    const autoAdvance = setInterval(() => {
        const carousel = document.querySelector('[x-data]');
        if (carousel && carousel.__x) {
            const data = carousel.__x.$data;
            if (data.testimonials && data.testimonials.length > 1) {
                data.currentSlide = data.currentSlide < data.testimonials.length - 1 ? data.currentSlide + 1 : 0;
            }
        }
    }, 5000);

    // Pause auto-advance on hover
    const carouselContainer = document.querySelector('.overflow-hidden');
    if (carouselContainer) {
        carouselContainer.addEventListener('mouseenter', () => clearInterval(autoAdvance));
        carouselContainer.addEventListener('mouseleave', () => {
            // Restart auto-advance
            setInterval(() => {
                const carousel = document.querySelector('[x-data]');
                if (carousel && carousel.__x) {
                    const data = carousel.__x.$data;
                    if (data.testimonials && data.testimonials.length > 1) {
                        data.currentSlide = data.currentSlide < data.testimonials.length - 1 ? data.currentSlide + 1 : 0;
                    }
                }
            }, 5000);
        });
    }
});
</script>
@endsection
