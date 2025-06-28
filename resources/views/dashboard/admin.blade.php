@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto mb-12">
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-2 text-center">New Subs (This Period)</h2>
            <div class="text-3xl font-bold text-brown text-center">{{ $newSubscriptions }}</div>
        </x-card>
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-2 text-center">Active Subs</h2>
            <div class="text-3xl font-bold text-brown text-center">{{ $subscriptionGrowth }}</div>
        </x-card>
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-2 text-center">Reactivated Subs</h2>
            <div class="text-3xl font-bold text-brown text-center">{{ $reactivations }}</div>
        </x-card>
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-2 text-center">Total Subs</h2>
            <div class="text-3xl font-bold text-brown text-center">{{ $totalSubscriptions }}</div>
        </x-card>
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-2 text-center">Paused Subs</h2>
            <div class="text-3xl font-bold text-brown text-center">{{ $pausedSubscriptions }}</div>
        </x-card>
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-2 text-center">Cancelled Subs</h2>
            <div class="text-3xl font-bold text-brown text-center">{{ $cancelledSubscriptions }}</div>
        </x-card>
        <x-card class="md:col-span-3">
            <h2 class="font-heading text-lg text-brown mb-2 text-center">Monthly Recurring Revenue (MRR)</h2>
            <div class="text-3xl font-bold text-brown text-center">Rp{{ number_format($mrr,0,',','.') }}</div>
        </x-card>
    </div>
    <div class="max-w-5xl mx-auto">
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-4">Recent Subscriptions</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-accent/20">
                    <thead class="bg-secondary/40">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-brown">Customer</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-brown">Plan</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-brown">Total Price</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-brown">Status</th>
                            <th class="px-4 py-2 text-left text-xs font-semibold text-brown">Created</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white/80 divide-y divide-accent/10">
                        @forelse($recentSubscriptions as $subscription)
                        <tr>
                            <td class="px-4 py-2">{{ $subscription->user->name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $subscription->mealPlan->name ?? '-' }}</td>
                            <td class="px-4 py-2">Rp{{ number_format($subscription->total_price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ ucfirst($subscription->status) }}</td>
                            <td class="px-4 py-2">{{ $subscription->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-brown py-4">No recent subscriptions.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-card>
    </div>
</div>
@endsection 