@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="section-title gradient-text">Our Meal Plans</h1>
            <p class="section-subtitle">Pilih paket makanan sehat favoritmu!</p>
        </div>

        <!-- Meal Plans Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
            @foreach($mealPlans as $plan)
            <div x-data="{ open: false }" class="meal-card group relative transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <img src="{{ $plan->image }}" class="w-full h-40 object-cover rounded-xl mb-4">
                <h3 class="font-heading text-xl text-navy mb-2">{{ $plan->name }}</h3>
                <p class="text-peach font-bold mb-2">Rp{{ number_format($plan->price, 0, ',', '.') }}</p>
                <p class="text-body text-navy mb-4">{{ $plan->description }}</p>
                <button class="btn-primary w-full mb-2">Pesan Sekarang</button>
                <button @click="open = true" class="btn-secondary w-full">Lihat Detail</button>
                @if($plan->is_best_seller ?? false)
                <span class="absolute top-4 right-4 bg-rose text-white text-xs px-3 py-1 rounded-full shadow">Best Seller</span>
                @endif
                <!-- Modal Detail -->
                <div x-show="open" x-cloak class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md relative">
                        <button @click="open = false" class="absolute top-2 right-2 text-rose text-xl">&times;</button>
                        <h3 class="font-heading text-xl mb-2">{{ $plan->name }}</h3>
                        <p>{{ $plan->full_details }}</p>
                    </div>
                </div>
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