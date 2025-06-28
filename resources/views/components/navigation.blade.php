<header class="fixed top-0 left-0 w-full glass-effect shadow-lg z-50 border-b-2 border-pink-pastel-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Brand Name -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-2xl font-bold gradient-text">
                    SEA Catering
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li>
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('meal_plans') }}" class="nav-link {{ request()->routeIs('meal_plans') ? 'active' : '' }}">
                            Menu / Meal Plans
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('subscription') }}" class="nav-link {{ request()->routeIs('subscription') ? 'active' : '' }}">
                            Subscription
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                            Contact Us
                        </a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                                My Dashboard
                            </a>
                        </li>
                        @can('access-admin-dashboard')
                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                    Admin
                                </a>
                            </li>
                        @endcan
                    @endauth
                </ul>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-pink-pastel-600 hover:text-pink-pastel-500 focus:outline-none focus:text-pink-pastel-500 p-2 rounded-full hover:bg-pink-pastel-100 transition-all duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 glass-effect border-t-2 border-pink-pastel-200 rounded-b-2xl">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} block px-3 py-2 rounded-xl text-base font-medium">
                    Home
                </a>
                <a href="{{ route('meal_plans') }}" class="nav-link {{ request()->routeIs('meal_plans') ? 'active' : '' }} block px-3 py-2 rounded-xl text-base font-medium">
                    Menu / Meal Plans
                </a>
                <a href="{{ route('subscription') }}" class="nav-link {{ request()->routeIs('subscription') ? 'active' : '' }} block px-3 py-2 rounded-xl text-base font-medium">
                    Subscription
                </a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }} block px-3 py-2 rounded-xl text-base font-medium">
                    Contact Us
                </a>
                @auth
                    <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }} block px-3 py-2 rounded-xl text-base font-medium">
                        My Dashboard
                    </a>
                    @can('access-admin-dashboard')
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} block px-3 py-2 rounded-xl text-base font-medium">
                            Admin
                        </a>
                    @endcan
                @endauth
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