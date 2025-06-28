@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8 relative overflow-hidden">
    <!-- Floating decorative elements -->
    <div class="floating-heart top-20 left-20 text-3xl">📊</div>
    <div class="floating-heart top-40 right-20 text-2xl" style="animation-delay: 1s;">💰</div>
    <div class="floating-heart bottom-40 left-20 text-2xl" style="animation-delay: 2s;">📈</div>
    <div class="floating-heart bottom-20 right-40 text-3xl" style="animation-delay: 0.5s;">🎯</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <div class="cute-icon mb-4">🌟</div>
            <h1 class="section-title gradient-text">Admin Dashboard 📊</h1>
            <p class="section-subtitle">Business insights and subscription management! 💼</p>
        </div>

        <!-- Date Range Filter -->
        <div class="card mb-8 relative">
            <div class="cute-icon absolute -top-3 -right-3">📅</div>
            <h2 class="text-2xl font-bold text-pink-pastel-700 mb-4">Filter by Date Range 📅</h2>
            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <label for="start_date" class="form-label">Start Date 📅</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $startDate }}"
                           class="input-field">
                </div>
                <div class="flex-1">
                    <label for="end_date" class="form-label">End Date 📅</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $endDate }}"
                           class="input-field">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="btn-primary">
                        Filter 🔍
                    </button>
                </div>
            </form>
        </div>

        <!-- Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- New Subscriptions -->
            <div class="feature-card text-center">
                <div class="cute-icon mb-2 text-3xl">📈</div>
                <h3 class="text-xl font-bold text-pink-pastel-700 mb-2">New Subscriptions</h3>
                <p class="text-3xl font-bold text-pink-pastel-600">{{ $newSubscriptions }}</p>
                <p class="text-sm text-pink-pastel-600 mt-2">This period ✨</p>
            </div>

            <!-- Monthly Recurring Revenue -->
            <div class="feature-card text-center">
                <div class="cute-icon mb-2 text-3xl">💰</div>
                <h3 class="text-xl font-bold text-pink-pastel-700 mb-2">MRR</h3>
                <p class="text-3xl font-bold text-green-600">Rp{{ number_format($mrr, 0, ',', '.') }}</p>
                <p class="text-sm text-pink-pastel-600 mt-2">Monthly Recurring Revenue 💎</p>
            </div>

            <!-- Reactivations -->
            <div class="feature-card text-center">
                <div class="cute-icon mb-2 text-3xl">🔄</div>
                <h3 class="text-xl font-bold text-pink-pastel-700 mb-2">Reactivations</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $reactivations }}</p>
                <p class="text-sm text-pink-pastel-600 mt-2">This period 🔄</p>
            </div>

            <!-- Active Subscriptions -->
            <div class="feature-card text-center">
                <div class="cute-icon mb-2 text-3xl">✅</div>
                <h3 class="text-xl font-bold text-pink-pastel-700 mb-2">Active Subscriptions</h3>
                <p class="text-3xl font-bold text-purple-600">{{ $subscriptionGrowth }}</p>
                <p class="text-sm text-pink-pastel-600 mt-2">Total active 💖</p>
            </div>
        </div>

        <!-- Additional Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Subscriptions -->
            <div class="feature-card text-center">
                <div class="cute-icon mb-2">📊</div>
                <h3 class="text-lg font-bold text-pink-pastel-700 mb-2">Total Subscriptions</h3>
                <p class="text-2xl font-bold text-pink-pastel-600">{{ $totalSubscriptions }}</p>
                <p class="text-sm text-pink-pastel-600 mt-2">All time 📈</p>
            </div>

            <!-- Paused Subscriptions -->
            <div class="feature-card text-center">
                <div class="cute-icon mb-2">⏸️</div>
                <h3 class="text-lg font-bold text-pink-pastel-700 mb-2">Paused Subscriptions</h3>
                <p class="text-2xl font-bold text-yellow-600">{{ $pausedSubscriptions }}</p>
                <p class="text-sm text-pink-pastel-600 mt-2">Currently paused ⏸️</p>
            </div>

            <!-- Cancelled Subscriptions -->
            <div class="feature-card text-center">
                <div class="cute-icon mb-2">❌</div>
                <h3 class="text-lg font-bold text-pink-pastel-700 mb-2">Cancelled Subscriptions</h3>
                <p class="text-2xl font-bold text-red-600">{{ $cancelledSubscriptions }}</p>
                <p class="text-sm text-pink-pastel-600 mt-2">Total cancelled 😢</p>
            </div>
        </div>

        <!-- Recent Subscriptions -->
        <div class="card relative">
            <div class="cute-icon absolute -top-3 -right-3">📋</div>
            <h2 class="text-2xl font-bold text-pink-pastel-700 mb-6">Recent Subscriptions 📋</h2>
            @if($recentSubscriptions->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-pink-pastel-200">
                        <thead class="bg-gradient-to-r from-pink-pastel-50 to-rose-pastel-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-pink-pastel-700 uppercase tracking-wider">Customer 👤</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-pink-pastel-700 uppercase tracking-wider">Plan 🍽️</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-pink-pastel-700 uppercase tracking-wider">Total Price 💰</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-pink-pastel-700 uppercase tracking-wider">Status 📊</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-pink-pastel-700 uppercase tracking-wider">Created 📅</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/50 divide-y divide-pink-pastel-200">
                            @foreach($recentSubscriptions as $subscription)
                            <tr class="hover:bg-pink-pastel-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-pink-pastel-800">{{ $subscription->name }}</div>
                                    <div class="text-sm text-pink-pastel-600">{{ $subscription->user->email ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-pink-pastel-800">{{ $subscription->mealPlan->name ?? 'Unknown Plan' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-green-600">Rp{{ number_format($subscription->total_price, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($subscription->status === 'active') bg-green-100 text-green-800 border border-green-300
                                        @elseif($subscription->status === 'paused') bg-yellow-100 text-yellow-800 border border-yellow-300
                                        @else bg-red-100 text-red-800 border border-red-300
                                        @endif">
                                        {{ ucfirst($subscription->status) }}
                                        @if($subscription->status === 'active') ✅
                                        @elseif($subscription->status === 'paused') ⏸️
                                        @else ❌
                                        @endif
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-pink-pastel-600">
                                    {{ $subscription->created_at->format('M d, Y') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <div class="cute-icon mb-4 text-4xl">📊</div>
                    <h3 class="text-lg font-bold text-pink-pastel-700 mb-2">No Subscriptions Yet 💕</h3>
                    <p class="text-pink-pastel-600">Subscriptions will appear here once customers start subscribing! ✨</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 