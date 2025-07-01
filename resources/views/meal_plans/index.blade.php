@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4" x-data="{ selectedPlan: null }">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-heading text-brown mb-4">Pilih Meal Plan Favoritmu</h1>
        <p class="text-lg text-brown max-w-2xl mx-auto">
            Nikmati berbagai pilihan menu sehat yang disesuaikan dengan kebutuhan dan preferensi Anda
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($mealPlans as $plan)
            <x-card class="group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer" 
                    @click="selectedPlan = {{ $plan->id }}">
                <div class="relative overflow-hidden rounded-2xl mb-6">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" 
                         alt="{{ $plan->name }}" 
                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-sm">Klik untuk detail lengkap</p>
                    </div>
                </div>
                
                <div class="text-center">
                    <h2 class="font-heading text-2xl text-brown mb-3">{{ $plan->name }}</h2>
                    <p class="text-brown mb-4 line-clamp-2">{{ $plan->description }}</p>
                    
                    <div class="flex items-center justify-center mb-4">
                        <div class="text-3xl font-bold text-pink-400">Rp{{ number_format($plan->price,0,',','.') }}</div>
                        <span class="text-brown ml-2">/minggu</span>
                    </div>
                    
                    <div class="flex items-center justify-center space-x-1 mb-6">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <span class="text-sm text-brown ml-2">(4.0)</span>
                    </div>
                    
                    <x-button href="{{ route('subscription') }}?plan={{ $plan->id }}"
                             variant="primary"
                             class="w-full text-center group-hover:bg-pink-500 transition-colors duration-300">
                        Langganan Sekarang
                    </x-button>
                </div>
            </x-card>
        @endforeach
    </div>

    <!-- Modal for Plan Details -->
    <div x-show="selectedPlan !== null" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
         @click.self="selectedPlan = null">
        
        <div x-show="selectedPlan !== null"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            
            <template x-for="plan in {{ $mealPlans }}" :key="plan.id">
                <div x-show="selectedPlan === plan.id" class="p-8">
                    <!-- Header -->
                    <div class="flex justify-between items-start mb-6">
                        <h2 class="text-3xl font-heading text-brown" x-text="plan.name"></h2>
                        <button @click="selectedPlan = null" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Image -->
                    <div class="relative mb-6">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80" 
                             :alt="plan.name" 
                             class="w-full h-64 object-cover rounded-2xl" />
                    </div>
                    
                    <!-- Price -->
                    <div class="text-center mb-6">
                        <div class="text-4xl font-bold text-pink-400" x-text="'Rp' + new Intl.NumberFormat('id-ID').format(plan.price)"></div>
                        <p class="text-brown">per minggu</p>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-xl font-heading text-brown mb-3">Deskripsi Lengkap</h3>
                        <p class="text-brown leading-relaxed" x-text="plan.description"></p>
                    </div>
                    
                    <!-- Full Details -->
                    <div class="mb-6">
                        <h3 class="text-xl font-heading text-brown mb-3">Detail Menu</h3>
                        <div class="bg-gray-50 rounded-2xl p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-semibold text-brown mb-2">Menu Harian:</h4>
                                    <ul class="text-brown space-y-1">
                                        <li>• Sarapan sehat dengan protein tinggi</li>
                                        <li>• Snack pagi dengan buah segar</li>
                                        <li>• Makan siang dengan karbohidrat kompleks</li>
                                        <li>• Snack sore dengan kacang-kacangan</li>
                                        <li>• Makan malam dengan sayuran hijau</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-brown mb-2">Informasi Nutrisi:</h4>
                                    <ul class="text-brown space-y-1">
                                        <li>• Kalori: 1200-1500 kcal/hari</li>
                                        <li>• Protein: 80-100g/hari</li>
                                        <li>• Karbohidrat: 120-150g/hari</li>
                                        <li>• Lemak: 40-50g/hari</li>
                                        <li>• Serat: 25-30g/hari</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Features -->
                    <div class="mb-8">
                        <h3 class="text-xl font-heading text-brown mb-3">Fitur Paket</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-brown">Bahan Organik</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-brown">Pengiriman Tepat Waktu</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-brown">Kemasan Ramah Lingkungan</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-brown">Garansi Kesegaran</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a x-bind:href="'/subscribe?plan=' + plan.id"
                           class="flex-1 text-center bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-2xl transition-colors duration-300 block text-center">
                            Langganan Sekarang
                        </a>
                        <x-button @click="selectedPlan = null" 
                                 variant="secondary" 
                                 class="flex-1 text-center">
                            Tutup
                        </x-button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add loading animation for cards
    const cards = document.querySelectorAll('.group');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-fade-in-up');
    });
});
</script>

<style>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.6s ease-out forwards;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection 