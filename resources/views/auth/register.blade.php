@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-background">
    <div class="w-full max-w-md bg-white/80 rounded-4xl shadow-lg p-10">
        <h1 class="text-3xl font-heading text-brown mb-2 text-center">Join Our Family</h1>
        <p class="text-accent text-center mb-8">Start your delicious journey with us!</p>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-4">
                <div class="flex items-center mb-3">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-red-800 font-medium">Terjadi kesalahan:</h3>
                </div>
                <ul class="text-red-700 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
