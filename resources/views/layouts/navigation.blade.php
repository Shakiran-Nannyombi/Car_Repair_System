<nav x-data="{ open: false, profileOpen: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @if(Auth::check())
                        @php $user = Auth::user(); @endphp
                        <a href="{{ $user->role === 'client' ? route('client.dashboard') : route('provider.dashboard') }}">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="block h-9 w-auto">
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="block h-9 w-auto">
                        </a>
                    @endif
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if(Auth::check())
                        @if(Auth::user()->role === 'client')
                            <x-nav-link :href="route('client.dashboard')" :active="request()->routeIs('client.dashboard')">
                                {{ __('Client Dashboard') }}
                            </x-nav-link>
                        @elseif(Auth::user()->role === 'provider')
                            <x-nav-link :href="route('provider.dashboard')" :active="request()->routeIs('provider.dashboard')">
                                {{ __('Provider Dashboard') }}
                            </x-nav-link>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Compact Profile Section with Dropdown -->
            @if(Auth::check())
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-2">
                <div class="relative">
                    <button @click="profileOpen = !profileOpen" class="flex items-center space-x-2">
                        <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('images/default.png') }}"
                             alt="Profile Picture"
                             class="w-6 h-6 rounded-full object-cover border-2 border-gray-300 shadow-sm">
                        <span class="text-sm font-medium text-gray-800 whitespace-nowrap">{{ Auth::user()->name }}</span>
                        <svg class="h-4 w-4 text-gray-600 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu for Logout -->
                    <div x-show="profileOpen" x-transition class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-2">
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-800">Login</a>
            </div>
            @endif

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        @if(Auth::check())
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::user()->role === 'client')
                <x-responsive-nav-link :href="route('client.dashboard')" :active="request()->routeIs('client.dashboard')">
                    {{ __('Client Dashboard') }}
                </x-responsive-nav-link>
            @elseif(Auth::user()->role === 'provider')
                <x-responsive-nav-link :href="route('provider.dashboard')" :active="request()->routeIs('provider.dashboard')">
                    {{ __('Provider Dashboard') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @else
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')">
                {{ __('Login') }}
            </x-responsive-nav-link>
        </div>
        @endif
    </div>
</nav>