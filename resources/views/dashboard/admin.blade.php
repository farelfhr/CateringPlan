@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <!-- Date Range Filter -->
    <div class="max-w-5xl mx-auto mb-8">
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-4">Filter Dashboard</h2>
            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex flex-wrap gap-4 items-end">
                <div class="flex-1 min-w-48">
                    <label for="start_date" class="block text-sm font-medium text-brown mb-1">Tanggal Mulai</label>
                    <input type="date" 
                           id="start_date" 
                           name="start_date" 
                           value="{{ request('start_date') }}"
                           class="w-full px-3 py-2 border border-accent/30 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="flex-1 min-w-48">
                    <label for="end_date" class="block text-sm font-medium text-brown mb-1">Tanggal Selesai</label>
                    <input type="date" 
                           id="end_date" 
                           name="end_date" 
                           value="{{ request('end_date') }}"
                           class="w-full px-3 py-2 border border-accent/30 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="flex-1 min-w-48">
                    <label for="plan_id" class="block text-sm font-medium text-brown mb-1">Filter Paket</label>
                    <select id="plan_id" name="plan_id" class="w-full px-3 py-2 border border-accent/30 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Semua Paket</option>
                        @foreach($allMealPlans as $plan)
                            <option value="{{ $plan->id }}" {{ $planId == $plan->id ? 'selected' : '' }}>
                                {{ $plan->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-2">
                    <x-button type="submit" variant="primary">Filter</x-button>
                    <a href="{{ route('admin.dashboard') }}">
                        <x-button type="button" variant="secondary">Reset</x-button>
                    </a>
                </div>
            </form>
        </x-card>
    </div>
    
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
    <!-- Analisis Bisnis -->
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-4">Pengguna Paling Aktif</h2>
            <ul class="space-y-3">
                @foreach($topUsers as $index => $user)
                    <li class="flex items-center justify-between">
                        <div class="flex items-center">
                            @if($index == 0) <span class="text-2xl mr-2">🥇</span>
                            @elseif($index == 1) <span class="text-2xl mr-2">🥈</span>
                            @elseif($index == 2) <span class="text-2xl mr-2">🥉</span>
                            @endif
                            <span>{{ $user->name }}</span>
                        </div>
                        <span class="font-bold text-brown">{{ $user->subscriptions_count }} Langganan</span>
                    </li>
                @endforeach
            </ul>
        </x-card>
        <x-card>
            <h2 class="font-heading text-lg text-brown mb-4">Paket Paling Laku</h2>
            <ul class="space-y-3">
                @foreach($popularPlans as $plan)
                    <li class="flex items-center justify-between">
                        <span>{{ $plan->name }}</span>
                        <span class="font-bold text-brown">{{ $plan->subscriptions_count }} Kali Dipesan</span>
                    </li>
                @endforeach
            </ul>
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
    <!-- Statistik & Kontrol Langganan Admin Sendiri -->
    <div class="max-w-5xl mx-auto mb-12">
        <h2 class="text-2xl font-heading text-brown mb-4">Langganan Anda (Sebagai Admin)</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center border-t-4 border-pink-400">
                <div class="bg-pink-100 p-3 rounded-full mb-3">
                    <svg class="w-7 h-7 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                </div>
                <div class="text-3xl font-bold text-pink-500">{{ $adminActiveCount }}</div>
                <div class="text-brown mt-1">Langganan Aktif</div>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center border-t-4 border-yellow-400">
                <div class="bg-yellow-100 p-3 rounded-full mb-3">
                    <svg class="w-7 h-7 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l4 4 4-4m0-5V3" /></svg>
                </div>
                <div class="text-3xl font-bold text-yellow-500">{{ $adminPausedCount }}</div>
                <div class="text-brown mt-1">Langganan Paused</div>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center border-t-4 border-green-400">
                <div class="bg-green-100 p-3 rounded-full mb-3">
                    <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 16v-4" /></svg>
                </div>
                <div class="text-2xl font-bold text-green-500">Rp{{ number_format($adminTotalSpending,0,',','.') }}</div>
                <div class="text-brown mt-1">Total Pengeluaran</div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-xl font-bold text-brown mb-4">Daftar Langganan Anda</h3>
            @if($adminSubscriptions->count())
            <div class="overflow-x-auto" x-data="{ openPauseModalId: null }">
                <table class="min-w-full text-brown">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Meal Plan</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Tanggal Mulai</th>
                            <th class="py-2 px-4 border-b">Harga</th>
                            <th class="py-2 px-4 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminSubscriptions as $subscription)
                        <tr class="hover:bg-pink-50 transition">
                            <td class="py-2 px-4 border-b font-semibold">{{ $subscription->mealPlan->name ?? '-' }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="inline-block px-2 py-1 rounded {{ $subscription->status == 'active' ? 'bg-green-100 text-green-700' : ($subscription->status == 'paused' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b">{{ $subscription->start_date }}</td>
                            <td class="py-2 px-4 border-b">Rp{{ number_format($subscription->total_price,0,',','.') }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($subscription->status === 'active')
                                <!-- Pause Button triggers modal -->
                                <button type="button" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-3 rounded mr-2" @click="openPauseModalId = {{ $subscription->id }}">Pause</button>
                                <!-- Pause Modal -->
                                <div x-show="openPauseModalId === {{ $subscription->id }}" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" @click.self="openPauseModalId = null">
                                    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md">
                                        <form method="POST" action="{{ route('subscription.pause', $subscription->id) }}">
                                            @csrf
                                            <h3 class="text-xl font-bold mb-4 text-brown">Jeda Langganan</h3>
                                            <div class="mb-4">
                                                <label for="pause_start_date_{{ $subscription->id }}" class="block text-sm font-medium text-brown mb-1">Tanggal Mulai Jeda</label>
                                                <input type="date" id="pause_start_date_{{ $subscription->id }}" name="pause_start_date" class="w-full px-3 py-2 border border-accent/30 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="pause_end_date_{{ $subscription->id }}" class="block text-sm font-medium text-brown mb-1">Tanggal Selesai Jeda</label>
                                                <input type="date" id="pause_end_date_{{ $subscription->id }}" name="pause_end_date" class="w-full px-3 py-2 border border-accent/30 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" required>
                                            </div>
                                            <div class="flex justify-end gap-2">
                                                <button type="button" class="bg-gray-200 hover:bg-gray-300 text-brown font-semibold py-2 px-4 rounded" @click="openPauseModalId = null">Batal</button>
                                                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded">Konfirmasi Jeda</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endif
                                @if($subscription->status === 'paused')
                                <form method="POST" action="{{ route('subscription.reactivate', $subscription->id) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-400 hover:bg-green-500 text-white font-bold py-1 px-3 rounded mr-2">Reactivate</button>
                                </form>
                                @endif
                                @if($subscription->status === 'active' || $subscription->status === 'paused')
                                <form method="POST" action="{{ route('subscription.cancel', $subscription->id) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-red-400 hover:bg-red-500 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Anda yakin ingin membatalkan langganan ini?')">Cancel</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-8">
                <p class="mb-4 text-brown">Belum ada langganan aktif.</p>
                <x-button :href="route('subscription')" variant="primary">Langganan Sekarang</x-button>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle date validation for pause forms (admin section)
    const pauseStartInputs = document.querySelectorAll('input[name="pause_start_date"]');
    const pauseEndInputs = document.querySelectorAll('input[name="pause_end_date"]');
    
    pauseStartInputs.forEach((startInput, index) => {
        const endInput = pauseEndInputs[index];
        
        startInput.addEventListener('change', function() {
            if (this.value) {
                // Set minimum date for end date to be one day after start date
                const startDate = new Date(this.value);
                startDate.setDate(startDate.getDate() + 1);
                const minEndDate = startDate.toISOString().split('T')[0];
                endInput.min = minEndDate;
                
                // Clear end date if it's before the new minimum
                if (endInput.value && endInput.value <= this.value) {
                    endInput.value = '';
                }
            }
        });
    });
});
</script>
@endsection
