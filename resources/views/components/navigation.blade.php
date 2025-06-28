<nav class="bg-white/80 shadow-lg rounded-4xl mt-4 mx-auto max-w-5xl px-6 py-3 flex items-center justify-between">
    <a href="{{ route('home') }}" class="text-2xl font-heading text-brown font-bold">SEA Catering</a>
    <div class="flex items-center space-x-2 md:space-x-4">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Home</x-nav-link>
        <x-nav-link :href="route('meal_plans')" :active="request()->routeIs('meal_plans')">Meal Plans</x-nav-link>
        <x-nav-link :href="route('subscription')" :active="request()->routeIs('subscription')">Subscribe</x-nav-link>
        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">Contact</x-nav-link>
        @auth
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
        @endauth
        @guest
            <x-nav-link :href="route('login')">Login</x-nav-link>
        @endguest
    </div>
</nav>