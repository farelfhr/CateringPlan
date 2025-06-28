<header class="fixed top-0 left-0 w-full bg-pink-50 shadow z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Brand Name -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-pink-700">
                    SEA Catering
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li>
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-pink-700 font-semibold' : 'text-gray-600 hover:text-pink-500' }} transition-colors duration-200">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('meal_plans') }}" class="{{ request()->routeIs('meal_plans') ? 'text-pink-700 font-semibold' : 'text-gray-600 hover:text-pink-500' }} transition-colors duration-200">
                            Menu / Meal Plans
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('subscription') }}" class="{{ request()->routeIs('subscription') ? 'text-pink-700 font-semibold' : 'text-gray-600 hover:text-pink-500' }} transition-colors duration-200">
                            Subscription
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-pink-700 font-semibold' : 'text-gray-600 hover:text-pink-500' }} transition-colors duration-200">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-pink-500 focus:outline-none focus:text-pink-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-pink-700 font-semibold' : 'text-gray-600 hover:text-pink-500' }} block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
                    Home
                </a>
                <a href="{{ route('meal_plans') }}" class="{{ request()->routeIs('meal_plans') ? 'text-pink-700 font-semibold' : 'text-gray-600 hover:text-pink-500' }} block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
                    Menu / Meal Plans
                </a>
                <a href="{{ route('subscription') }}" class="{{ request()->routeIs('subscription') ? 'text-pink-700 font-semibold' : 'text-gray-600 hover:text-pink-500' }} block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
                    Subscription
                </a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-pink-700 font-semibold' : 'text-gray-600 hover:text-pink-500' }} block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });
});
</script>