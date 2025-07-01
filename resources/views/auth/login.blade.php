@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-background">
    <div class="w-full max-w-md bg-white/80 rounded-4xl shadow-lg p-10">
        <h1 class="text-3xl font-heading text-brown mb-2 text-center">Welcome Back</h1>
        <p class="text-accent text-center mb-8">Log in to access your delicious meals</p>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <x-input-label for="email">Email</x-input-label>
                <x-text-input type="email" name="email" required autofocus />
            </div>
            <div>
                <x-input-label for="password">Password</x-input-label>
                <x-text-input type="password" name="password" required />
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded mr-2">
                    <span class="text-sm text-brown">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-accent hover:underline text-sm">Forgot password?</a>
            </div>
            <x-button type="submit" variant="primary" class="w-full">Log in</x-button>
        </form>
        <div class="text-center mt-6">
            <span class="text-brown">Don't have an account?</span>
            <a href="{{ route('register') }}" class="text-accent hover:underline font-semibold">Register here</a>
        </div>
    </div>
</div>
@endsection
