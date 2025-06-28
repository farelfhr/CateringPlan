@extends('layouts.app')

@section('content')
<div class="bg-pink-50 min-h-screen py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-pink-700 mt-8 mb-4">My Subscriptions</h1>
            <p class="text-lg text-gray-600">Manage your meal plan subscriptions</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        <!-- Subscriptions List -->
        @if($subscriptions->count() > 0)
            <div class="space-y-6">
                @foreach($subscriptions as $subscription)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <!-- Subscription Details -->
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-2xl font-semibold text-pink-700">{{ $subscription->mealPlan->name ?? 'Unknown Plan' }}</h3>
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    @if($subscription->status === 'active') bg-green-100 text-green-800
                                    @elseif($subscription->status === 'paused') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Total Price</p>
                                    <p class="text-lg font-bold text-green-600">Rp{{ number_format($subscription->total_price, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Meal Types</p>
                                    <p class="text-gray-700">{{ implode(', ', $subscription->meal_types) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Delivery Days</p>
                                    <p class="text-gray-700">{{ implode(', ', $subscription->delivery_days) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Created</p>
                                    <p class="text-gray-700">{{ $subscription->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>

                            @if($subscription->allergies)
                            <div class="mb-4">
                                <p class="text-sm font-medium text-gray-500">Allergies & Restrictions</p>
                                <p class="text-gray-700">{{ $subscription->allergies }}</p>
                            </div>
                            @endif

                            @if($subscription->status === 'paused' && $subscription->pause_start_date && $subscription->pause_end_date)
                            <div class="mb-4 p-3 bg-yellow-50 rounded-lg">
                                <p class="text-sm font-medium text-yellow-800">Paused Period</p>
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
                                            class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                        Pause Subscription
                                    </button>

                                    <!-- Pause Modal -->
                                    <div x-show="openPauseModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                                        <div class="bg-white rounded-lg shadow-xl max-w-md w-full p-6">
                                            <h3 class="text-xl font-bold text-pink-700 mb-4">Pause Subscription</h3>
                                            <form action="{{ route('subscription.pause', $subscription) }}" method="POST">
                                                @csrf
                                                <div class="mb-4">
                                                    <label for="pause_start_date" class="block text-sm font-medium text-gray-700 mb-2">Pause Start Date</label>
                                                    <input type="date" id="pause_start_date" name="pause_start_date" required
                                                           min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                                           class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                                                </div>
                                                <div class="mb-6">
                                                    <label for="pause_end_date" class="block text-sm font-medium text-gray-700 mb-2">Pause End Date</label>
                                                    <input type="date" id="pause_end_date" name="pause_end_date" required
                                                           class="block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                                                </div>
                                                <div class="flex gap-3">
                                                    <button type="button" @click="openPauseModal = false"
                                                            class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors">
                                                        Cancel
                                                    </button>
                                                    <button type="submit"
                                                            class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                                        Pause
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cancel Subscription -->
                                <div class="flex-1">
                                    <form action="{{ route('subscription.cancel', $subscription) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to cancel this subscription? This action cannot be undone.')">
                                        @csrf
                                        <button type="submit" 
                                                class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                            Cancel Subscription
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
                <div class="text-6xl text-pink-300 mb-4">🍽️</div>
                <h3 class="text-2xl font-semibold text-gray-700 mb-2">No Subscriptions Yet</h3>
                <p class="text-gray-600 mb-6">You haven't subscribed to any meal plans yet.</p>
                <a href="{{ route('subscription') }}" 
                   class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-full transition-colors">
                    Subscribe Now
                </a>
            </div>
        @endif
    </div>
</div>
@endsection 