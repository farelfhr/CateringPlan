@extends('layouts.app')

@section('content')
<div class="bg-pink-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-pink-700 mt-8 mb-4">Admin Dashboard</h1>
            <p class="text-lg text-gray-600">Business insights and subscription management</p>
        </div>

        <!-- Date Range Filter -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-pink-700 mb-4">Filter by Date Range</h2>
            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $startDate }}"
                           class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>
                <div class="flex-1">
                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $endDate }}"
                           class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-6 rounded-lg transition-colors">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- New Subscriptions -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="text-3xl text-pink-500 mb-2">📈</div>
                <h3 class="text-2xl font-semibold text-pink-600 mb-2">New Subscriptions</h3>
                <p class="text-4xl font-bold text-gray-800">{{ $newSubscriptions }}</p>
                <p class="text-sm text-gray-600 mt-2">This period</p>
            </div>

            <!-- Monthly Recurring Revenue -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="text-3xl text-green-500 mb-2">💰</div>
                <h3 class="text-2xl font-semibold text-pink-600 mb-2">MRR</h3>
                <p class="text-4xl font-bold text-green-600">Rp{{ number_format($mrr, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-600 mt-2">Monthly Recurring Revenue</p>
            </div>

            <!-- Reactivations -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="text-3xl text-blue-500 mb-2">🔄</div>
                <h3 class="text-2xl font-semibold text-pink-600 mb-2">Reactivations</h3>
                <p class="text-4xl font-bold text-blue-600">{{ $reactivations }}</p>
                <p class="text-sm text-gray-600 mt-2">This period</p>
            </div>

            <!-- Active Subscriptions -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <div class="text-3xl text-purple-500 mb-2">✅</div>
                <h3 class="text-2xl font-semibold text-pink-600 mb-2">Active Subscriptions</h3>
                <p class="text-4xl font-bold text-purple-600">{{ $subscriptionGrowth }}</p>
                <p class="text-sm text-gray-600 mt-2">Total active</p>
            </div>
        </div>

        <!-- Additional Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Subscriptions -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-semibold text-pink-600 mb-2">Total Subscriptions</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $totalSubscriptions }}</p>
                <p class="text-sm text-gray-600 mt-2">All time</p>
            </div>

            <!-- Paused Subscriptions -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-semibold text-pink-600 mb-2">Paused Subscriptions</h3>
                <p class="text-3xl font-bold text-yellow-600">{{ $pausedSubscriptions }}</p>
                <p class="text-sm text-gray-600 mt-2">Currently paused</p>
            </div>

            <!-- Cancelled Subscriptions -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-xl font-semibold text-pink-600 mb-2">Cancelled Subscriptions</h3>
                <p class="text-3xl font-bold text-red-600">{{ $cancelledSubscriptions }}</p>
                <p class="text-sm text-gray-600 mt-2">Total cancelled</p>
            </div>
        </div>

        <!-- Recent Subscriptions -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-pink-700 mb-6">Recent Subscriptions</h2>
            @if($recentSubscriptions->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($recentSubscriptions as $subscription)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $subscription->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $subscription->user->email ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $subscription->mealPlan->name ?? 'Unknown Plan' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-green-600">Rp{{ number_format($subscription->total_price, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($subscription->status === 'active') bg-green-100 text-green-800
                                        @elseif($subscription->status === 'paused') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($subscription->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $subscription->created_at->format('M d, Y') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <div class="text-4xl text-pink-300 mb-4">📊</div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">No Subscriptions Yet</h3>
                    <p class="text-gray-600">Subscriptions will appear here once customers start subscribing.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 