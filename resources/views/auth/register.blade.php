@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-background">
    <div class="w-full max-w-md bg-white/80 rounded-4xl shadow-lg p-10">
        <h1 class="text-3xl font-heading text-brown mb-2 text-center">Join Our Family</h1>
        <p class="text-accent text-center mb-8">Start your delicious journey with us!</p>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}" class="space-y-6" x-data="{ isSubmitting: false }" @submit="isSubmitting = true">
            @csrf
            <div>
                <x-input-label for="name">Name</x-input-label>
                <x-text-input name="name" required autofocus />
            </div>
            <div>
                <x-input-label for="email">Email</x-input-label>
                <x-text-input type="email" name="email" required />
            </div>
            <div>
                <x-input-label for="password">Password</x-input-label>
                <x-text-input type="password" name="password" required />
            </div>
            <div>
                <x-input-label for="password_confirmation">Confirm Password</x-input-label>
                <x-text-input type="password" name="password_confirmation" required />
            </div>
            <x-button type="submit" variant="primary" class="w-full" @:disabled="isSubmitting">
                <span @x-show="!isSubmitting">Register</span>
                <span @x-show="isSubmitting"><svg class="inline w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Processing...</span>
            </x-button>
        </form>
        <div class="text-center mt-6">
            <span class="text-brown">Already registered?</span>
            <a href="{{ route('login') }}" class="text-accent hover:underline font-semibold">Login</a>
        </div>
    </div>
</div>
@endsection
