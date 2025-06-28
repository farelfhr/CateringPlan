<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Floating decorative elements -->
        <div class="floating-heart top-20 left-20 text-3xl">💖</div>
        <div class="floating-heart top-40 right-20 text-2xl" style="animation-delay: 1s;">🌸</div>
        <div class="floating-heart bottom-40 left-20 text-2xl" style="animation-delay: 2s;">✨</div>
        <div class="floating-heart bottom-20 right-40 text-3xl" style="animation-delay: 0.5s;">🍰</div>

        <div class="card max-w-md w-full mx-4 relative">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="cute-icon mb-4">🎉</div>
                <h2 class="section-title">Join Our Family! 💕</h2>
                <p class="text-pink-pastel-600">Start your delicious journey with us! 🍽️</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="form-label" />
                    <x-text-input id="name" class="input-field" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your full name 👤" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email ✉️" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                    <x-text-input id="password" class="input-field"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" 
                                    placeholder="Create a strong password 🔒" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                    <x-text-input id="password_confirmation" class="input-field"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" 
                                    placeholder="Confirm your password 🔐" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-sm text-pink-pastel-600 hover:text-pink-pastel-500 underline transition-colors duration-300" href="{{ route('login') }}">
                        {{ __('Already registered?') }} 😊
                    </a>

                    <x-primary-button class="btn-primary">
                        {{ __('Register') }} ✨
                    </x-primary-button>
                </div>
            </form>

            <!-- Benefits -->
            <div class="mt-8 p-4 bg-gradient-to-r from-pink-pastel-50 to-rose-pastel-50 rounded-xl">
                <h3 class="text-sm font-semibold text-pink-pastel-700 mb-2">Why join us? 🌟</h3>
                <ul class="text-xs text-pink-pastel-600 space-y-1">
                    <li>🍽️ Customizable meal plans</li>
                    <li>🚚 Nationwide delivery</li>
                    <li>💝 Special member discounts</li>
                    <li>📊 Detailed nutrition info</li>
                </ul>
            </div>
        </div>
    </div>
</x-guest-layout>
