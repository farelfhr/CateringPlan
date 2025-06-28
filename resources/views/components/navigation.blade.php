<nav class="bg-white/80 backdrop-blur-sm shadow-lg rounded-4xl mt-4 mx-auto max-w-5xl px-6 py-3 flex items-center justify-between sticky top-4 z-50" x-data="{ mobileMenuOpen: false }">
    <a href="{{ route('home') }}" class="text-2xl font-heading text-brown font-bold hover:text-pink-400 transition-colors duration-300">
        SEA Catering
    </a>
    
    <!-- Desktop Navigation -->
    <div class="hidden md:flex items-center space-x-2 lg:space-x-4">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="group">
            <span class="relative">
                Home
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-pink-400 transition-all duration-300 group-hover:w-full"></span>
            </span>
        </x-nav-link>
        <x-nav-link :href="route('meal_plans')" :active="request()->routeIs('meal_plans')" class="group">
            <span class="relative">
                Menu
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-pink-400 transition-all duration-300 group-hover:w-full"></span>
            </span>
        </x-nav-link>
        <x-nav-link :href="route('subscription')" :active="request()->routeIs('subscription')" class="group">
            <span class="relative">
                Subscription
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-pink-400 transition-all duration-300 group-hover:w-full"></span>
            </span>
        </x-nav-link>
        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="group">
            <span class="relative">
                Contact Us
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-pink-400 transition-all duration-300 group-hover:w-full"></span>
            </span>
        </x-nav-link>
        @auth
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="group">
                <span class="relative">
                    Dashboard
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-pink-400 transition-all duration-300 group-hover:w-full"></span>
                </span>
            </x-nav-link>
        @endauth
        @guest
            <x-nav-link :href="route('login')" class="group">
                <span class="relative">
                    Login
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-pink-400 transition-all duration-300 group-hover:w-full"></span>
                </span>
            </x-nav-link>
        @endguest
    </div>

    <!-- Mobile Menu Button -->
    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg hover:bg-pink-50 transition-colors duration-300">
        <svg class="w-6 h-6 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <svg class="w-6 h-6 text-brown" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <!-- Mobile Navigation -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="absolute top-full left-0 right-0 mt-2 bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-4 md:hidden">
        <div class="flex flex-col space-y-3">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="block py-2 px-4 rounded-lg hover:bg-pink-50 transition-colors duration-300">
                Home
            </x-nav-link>
            <x-nav-link :href="route('meal_plans')" :active="request()->routeIs('meal_plans')" class="block py-2 px-4 rounded-lg hover:bg-pink-50 transition-colors duration-300">
                Menu
            </x-nav-link>
            <x-nav-link :href="route('subscription')" :active="request()->routeIs('subscription')" class="block py-2 px-4 rounded-lg hover:bg-pink-50 transition-colors duration-300">
                Subscription
            </x-nav-link>
            <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="block py-2 px-4 rounded-lg hover:bg-pink-50 transition-colors duration-300">
                Contact Us
            </x-nav-link>
            @auth
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block py-2 px-4 rounded-lg hover:bg-pink-50 transition-colors duration-300">
                    Dashboard
                </x-nav-link>
            @endauth
            @guest
                <x-nav-link :href="route('login')" class="block py-2 px-4 rounded-lg hover:bg-pink-50 transition-colors duration-300">
                    Login
                </x-nav-link>
            @endguest
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Highlight active navigation link
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('a[href]');
    
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath || 
            (currentPath.startsWith(link.getAttribute('href')) && link.getAttribute('href') !== '/')) {
            link.classList.add('text-pink-400', 'font-semibold');
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>