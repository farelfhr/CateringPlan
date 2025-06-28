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
                <div class="cute-icon mb-4">🌟</div>
                <h2 class="section-title">Welcome Back! 💕</h2>
                <p class="text-pink-pastel-600">Let's get you back to your delicious meals! 🍽️</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email ✉️" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                    <x-text-input id="password" class="input-field"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" 
                                    placeholder="Enter your password 🔒" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-pink-pastel-300 text-pink-pastel-600 shadow-sm focus:ring-pink-pastel-500 focus:border-pink-pastel-500" name="remember">
                        <span class="ms-2 text-sm text-pink-pastel-700">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-pink-pastel-600 hover:text-pink-pastel-500 underline transition-colors duration-300" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }} 😅
                        </a>
                    @endif

                    <x-primary-button class="btn-primary">
                        {{ __('Log in') }} 💖
                    </x-primary-button>
                </div>
            </form>

            <!-- Register link -->
            <div class="mt-8 text-center">
                <p class="text-pink-pastel-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-pink-pastel-500 hover:text-pink-pastel-600 font-semibold underline transition-colors duration-300">
                        Register here! ✨
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
