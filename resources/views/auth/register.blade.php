@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-background">
    <div class="w-full max-w-md bg-white/80 rounded-4xl shadow-lg p-10">
        <h1 class="text-3xl font-heading text-brown mb-2 text-center">Join Our Family</h1>
        <p class="text-accent text-center mb-8">Start your delicious journey with us!</p>
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
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
            <x-button type="submit" variant="primary" class="w-full">Register</x-button>
        </form>
        <div class="text-center mt-6">
            <span class="text-brown">Already registered?</span>
            <a href="{{ route('login') }}" class="text-accent hover:underline font-semibold">Login</a>
        </div>
    </div>
</div>
@endsection
