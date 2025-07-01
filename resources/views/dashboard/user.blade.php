@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12" x-data="{ openPauseModalId: null }">
    <div class="max-w-5xl mx-auto">
        <!-- Personalized Greeting -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl md:text-4xl font-heading text-brown font-bold mb-2">Halo, {{ auth()->user()->name }}! 👋</h1>
            <p class="text-brown text-lg">Selamat datang di Dashboard Pelanggan Catering Plan</p>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center border-t-4 border-pink-400">
                <div class="bg-pink-100 p-3 rounded-full mb-3">
                    <svg class="w-7 h-7 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                </div>
                <div class="text-3xl font-bold text-pink-500">{{ $activeSubscriptionsCount }}</div>
                <div class="text-brown mt-1">Langganan Aktif</div>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center border-t-4 border-yellow-400">
                <div class="bg-yellow-100 p-3 rounded-full mb-3">
                    <svg class="w-7 h-7 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l4 4 4-4m0-5V3" /></svg>
                </div>
                <div class="text-3xl font-bold text-yellow-500">{{ $pausedSubscriptionsCount }}</div>
                <div class="text-brown mt-1">Langganan Paused</div>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center border-t-4 border-green-400">
                <div class="bg-green-100 p-3 rounded-full mb-3">
                    <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 16v-4" /></svg>
                </div>
                <div class="text-2xl font-bold text-green-500">Rp{{ number_format($totalSpending,0,',','.') }}</div>
                <div class="text-brown mt-1">Total Pengeluaran</div>
            </div>
        </div>

        <!-- Feedback Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md text-center">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md text-center">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="hidden"></div>
        @endif

        <!-- Subscriptions Table -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-xl font-bold text-brown mb-4">Daftar Langganan Anda</h2>
            @if($subscriptions->count())
            <div class="overflow-x-auto">
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
                        @foreach($subscriptions as $subscription)
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
                                            @if ($errors->pauseSubscription->any())
                                                <div class="mb-4 text-sm text-red-600">
                                                    <ul class="list-disc list-inside">
                                                        @foreach ($errors->pauseSubscription->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
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
    // Handle date validation for pause forms
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
