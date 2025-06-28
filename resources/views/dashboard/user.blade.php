@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <x-card class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-heading text-brown mb-6 text-center">Dashboard Kamu</h1>
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
                        <form method="POST" action="{{ route('subscription.pause', $subscription->id) }}">
                            @csrf
                            <x-button variant="secondary">Pause</x-button>
                        </form>
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
@endsection 