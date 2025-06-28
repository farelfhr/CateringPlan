@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8 relative overflow-hidden">
    <!-- Floating decorative elements -->
    <div class="floating-heart top-20 left-20 text-3xl">💝</div>
    <div class="floating-heart top-40 right-20 text-2xl" style="animation-delay: 1s;">🌸</div>
    <div class="floating-heart bottom-40 left-20 text-2xl" style="animation-delay: 2s;">✨</div>
    <div class="floating-heart bottom-20 right-40 text-3xl" style="animation-delay: 0.5s;">🍽️</div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <div class="cute-icon mb-4">🌟</div>
            <h1 class="section-title gradient-text">My Subscriptions 💝</h1>
            <p class="section-subtitle">Manage your meal plan subscriptions! 🍽️</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-gradient-to-r from-green-100 to-green-200 border-2 border-green-300 text-green-700 px-6 py-4 rounded-xl mb-8 text-center font-semibold">
            <span class="cute-icon mr-2">🎉</span>
            {{ session('success') }}
        </div>
        @endif

        <!-- Subscriptions List -->
        @if($subscriptions->count() > 0)
            <div class="space-y-6">
                @foreach($subscriptions as $subscription)
                <div class="meal-card relative">
                    <div class="cute-icon absolute -top-3 -right-3">💖</div>
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <!-- Subscription Details -->
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-2xl font-bold text-pink-pastel-700">{{ $subscription->mealPlan->name ?? 'Unknown Plan' }}</h3>
                                <span class="px-4 py-2 rounded-full text-sm font-medium 
                                    @if($subscription->status === 'active') bg-green-100 text-green-800 border-2 border-green-300
                                    @elseif($subscription->status === 'paused') bg-yellow-100 text-yellow-800 border-2 border-yellow-300
                                    @else bg-red-100 text-red-800 border-2 border-red-300
                                    @endif">
                                    {{ ucfirst($subscription->status) }} 
                                    @if($subscription->status === 'active') ✅
                                    @elseif($subscription->status === 'paused') ⏸️
                                    @else ❌
                                    @endif
                                </span>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                                <div class="feature-card text-center">
                                    <div class="cute-icon mb-2">💰</div>
                                    <p class="text-sm font-medium text-pink-pastel-600">Total Price</p>
                                    <p class="text-lg font-bold text-green-600">Rp{{ number_format($subscription->total_price, 0, ',', '.') }}</p>
                                </div>
                                <div class="feature-card text-center">
                                    <div class="cute-icon mb-2">🍽️</div>
                                    <p class="text-sm font-medium text-pink-pastel-600">Meal Types</p>
                                    <p class="text-pink-pastel-700">{{ implode(', ', $subscription->meal_types) }}</p>
                                </div>
                                <div class="feature-card text-center">
                                    <div class="cute-icon mb-2">📅</div>
                                    <p class="text-sm font-medium text-pink-pastel-600">Delivery Days</p>
                                    <p class="text-pink-pastel-700">{{ implode(', ', $subscription->delivery_days) }}</p>
                                </div>
                                <div class="feature-card text-center">
                                    <div class="cute-icon mb-2">📆</div>
                                    <p class="text-sm font-medium text-pink-pastel-600">Created</p>
                                    <p class="text-pink-pastel-700">{{ $subscription->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>

                            @if($subscription->allergies)
                            <div class="mb-4 p-4 bg-gradient-to-r from-pink-pastel-50 to-rose-pastel-50 rounded-xl">
                                <p class="text-sm font-medium text-pink-pastel-700 mb-1">⚠️ Allergies & Restrictions</p>
                                <p class="text-pink-pastel-600">{{ $subscription->allergies }}</p>
                            </div>
                            @endif

                            @if($subscription->status === 'paused' && $subscription->pause_start_date && $subscription->pause_end_date)
                            <div class="mb-4 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl border-2 border-yellow-200">
                                <p class="text-sm font-medium text-yellow-800 mb-1">⏸️ Paused Period</p>
                                <p class="text-yellow-700">{{ $subscription->pause_start_date->format('M d, Y') }} - {{ $subscription->pause_end_date->format('M d, Y') }}</p>
                            </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 mt-4 lg:mt-0 lg:ml-6">
                            @if($subscription->status === 'active')
                                <!-- Pause Subscription Modal -->
                                <div x-data="{ openPauseModal: false }" class="flex-1">
                                    <button @click="openPauseModal = true" 
                                            class="w-full btn-secondary">
                                        Pause Subscription ⏸️
                                    </button>

                                    <!-- Pause Modal -->
                                    <div x-show="openPauseModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                                        <div class="card max-w-md w-full relative">
                                            <button @click="openPauseModal = false" class="absolute top-4 right-4 text-pink-pastel-500 hover:text-pink-pastel-700 text-2xl font-bold cute-icon">
                                                ✕
                                            </button>
                                            <div class="text-center mb-6">
                                                <div class="cute-icon mb-2">⏸️</div>
                                                <h3 class="text-xl font-bold text-pink-pastel-700 mb-2">Pause Subscription</h3>
                                            </div>
                                            <form action="{{ route('subscription.pause', $subscription) }}" method="POST">
                                                @csrf
                                                <div class="mb-4">
                                                    <label for="pause_start_date" class="form-label">Pause Start Date 📅</label>
                                                    <input type="date" id="pause_start_date" name="pause_start_date" required
                                                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                                           class="input-field">
                                                </div>
                                                <div class="mb-6">
                                                    <label for="pause_end_date" class="form-label">Pause End Date 📅</label>
                                                    <input type="date" id="pause_end_date" name="pause_end_date" required
                                                           class="input-field">
                                                </div>
                                                <div class="flex gap-3">
                                                    <button type="button" @click="openPauseModal = false"
                                                            class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-xl transition-colors">
                                                        Cancel 😅
                                                    </button>
                                                    <button type="submit"
                                                            class="flex-1 btn-secondary">
                                                        Pause ⏸️
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cancel Subscription -->
                                <div class="flex-1">
                                    <form action="{{ route('subscription.cancel', $subscription) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to cancel this subscription? This action cannot be undone. 😢')">
                                        @csrf
                                        <button type="submit" 
                                                class="w-full bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-xl transition-colors">
                                            Cancel Subscription ❌
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- No Subscriptions -->
            <div class="text-center py-12">
                <div class="cute-icon mb-4 text-6xl">🍽️</div>
                <h3 class="text-2xl font-bold text-pink-pastel-700 mb-2">No Subscriptions Yet 💕</h3>
                <p class="text-pink-pastel-600 mb-6">You haven't subscribed to any meal plans yet.</p>
                <a href="{{ route('subscription') }}" 
                   class="btn-primary">
                    Subscribe Now ✨
                </a>
            </div>
        @endif
    </div>
</div>

<div class="max-w-3xl mx-auto mt-12">
    <div class="cute-card p-8">
        <h1 class="section-title gradient-text">Dashboard Kamu</h1>
        <div class="mb-6">
            <div class="text-primarybrown font-semibold mb-2">Status Langganan:</div>
            <div class="text-lg mb-2">{{ $subscription->status ?? 'Belum Langganan' }}</div>
            @if($subscription)
                <div class="mb-2">Meal Plan: <span class="font-bold">{{ $subscription->mealPlan->name }}</span></div>
                <div class="mb-2">Mulai: <span class="font-bold">{{ $subscription->start_date }}</span></div>
                <div class="mb-2">Alamat: <span class="font-bold">{{ $subscription->address }}</span></div>
                <div class="mb-2">No. HP: <span class="font-bold">{{ $subscription->phone }}</span></div>
                <form method="POST" action="{{ route('subscriptions.pause', $subscription->id) }}" class="inline-block mr-2">
                    @csrf
                    <button type="submit" class="cute-button">Pause</button>
                </form>
                <form method="POST" action="{{ route('subscriptions.reactivate', $subscription->id) }}" class="inline-block">
                    @csrf
                    <button type="submit" class="cute-button">Reactivate</button>
                </form>
            @else
                <a href="{{ route('subscription') }}" class="cute-button">Langganan Sekarang</a>
            @endif
        </div>
    </div>
</div>
@endsection 