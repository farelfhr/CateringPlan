@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <x-card class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-heading text-brown mb-6 text-center">Dashboard Kamu</h1>
        
        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        
        {{-- Error Message --}}
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                {{ session('error') }}
            </div>
        @endif
        
        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($subscriptions->count())
            @foreach($subscriptions as $subscription)
                <div class="mb-8 border-b border-accent/20 pb-6 last:border-b-0 last:pb-0">
                    <div class="mb-2 text-brown font-semibold">Status: <span class="font-normal">{{ $subscription->status }}</span></div>
                    <div class="mb-2">Meal Plan: <span class="font-bold">{{ $subscription->mealPlan->name ?? '-' }}</span></div>
                    <div class="mb-2">Mulai: <span class="font-bold">{{ $subscription->start_date }}</span></div>
                    <div class="mb-2">Alamat: <span class="font-bold">{{ $subscription->address }}</span></div>
                    <div class="mb-2">No. HP: <span class="font-bold">{{ $subscription->phone }}</span></div>
                    <div class="flex gap-4 mt-4">
                        @if($subscription->status === 'active')
                        <div class="w-full">
                            <form method="POST" action="{{ route('subscription.pause', $subscription->id) }}" class="space-y-4">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="pause_start_date_{{ $subscription->id }}" class="block text-sm font-medium text-brown mb-1">Tanggal Mulai Pause</label>
                                        <input type="date" 
                                               id="pause_start_date_{{ $subscription->id }}" 
                                               name="pause_start_date" 
                                               class="w-full px-3 py-2 border border-accent/30 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                                               min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                               required>
                                    </div>
                                    <div>
                                        <label for="pause_end_date_{{ $subscription->id }}" class="block text-sm font-medium text-brown mb-1">Tanggal Selesai Pause</label>
                                        <input type="date" 
                                               id="pause_end_date_{{ $subscription->id }}" 
                                               name="pause_end_date" 
                                               class="w-full px-3 py-2 border border-accent/30 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                                               required>
                                    </div>
                                </div>
                                <x-button type="submit" variant="secondary">Pause Subscription</x-button>
                            </form>
                        </div>
                        @endif
                        @if($subscription->status === 'paused')
                        <form method="POST" action="{{ route('subscription.reactivate', $subscription->id) }}">
                            @csrf
                            <x-button variant="accent">Reactivate</x-button>
                        </form>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center">
                <p class="mb-4 text-brown">Belum ada langganan aktif.</p>
                <x-button :href="route('subscription')" variant="primary">Langganan Sekarang</x-button>
            </div>
        @endif
        <form method="POST" action="{{ route('logout') }}" class="mt-8 text-center">
            @csrf
            <x-button type="submit" variant="secondary">Log Out</x-button>
        </form>
    </x-card>
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
