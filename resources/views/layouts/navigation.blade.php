<nav x-data="{ open: false }" class="bg-gray-100  ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="max-w-24" src="/siteImages/logo.png" alt="image" >
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden sm:flex">
                    <ul class="flex gap-4 ms-5 mt-5">
                        <li><a href="{{ url('/') }}" class=" hover:text-red-500">Home</a></li>
                        <li><a href="{{ url('/about') }}" class=" hover:text-red-500">About</a></li>
                        <li><a href="{{ url('/all_recipes') }}" class=" hover:text-red-500">All Recipes</a></li>
                        <li><a href="{{ url('/vegetarian') }}" class=" hover:text-red-500">Vegetarian</a></li>
                        <li><a href="{{ url('/wines') }}" class=" hover:text-red-500">Wines</a></li>
                        <li><a href="{{ url('/sweets') }}" class=" hover:text-red-500">Sweets</a></li>
                
                        <li><a href="{{ route('favorites.index') }}" class="text-gray-800 hover:text-red-500">My Favorites</a></li>
                        <li><a href="{{ url('/contact') }}" class=" hover:text-red-500">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Settings Dropdown -->


            @auth
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-5 border border-transparent text-[15px] lg:text-[16px] leading-4 font-medium rounded-md text-gray-800 bg-gray-100 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>Welcome, {{ Auth::user()->name }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
        
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
        
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @endauth
        @guest
<ul class=" gap-4 ms-5 mt-5 hidden sm:flex">
    <li>
        <a href="{{ route('login') }}" class="block p-2 border border-gray-400 rounded">Log in</a>
    </li>
    @if (Route::has('register'))
        <li>
            <a href="{{ route('register') }}" class="block p-2 border border-gray-400 rounded">Register</a>
        </li>
    @endif
</ul>
    @endguest

            <!-- Hamburger Button for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

   <!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-200">
    <ul class="py-2 px-4 space-y-2">
        <li><a href="{{ url('/') }}" class="block p-2 text-gray-800 ">Home</a></li>
        <li><a href="{{ url('/all_recipes') }}" class="block p-2 text-gray-800">All Recipes</a></li>
        <li><a href="{{ url('/vegetarian') }}" class="block p-2 text-gray-800">Vegetarian</a></li>
        <li><a href="{{ url('/wines') }}" class="block p-2 text-gray-800">Wines</a></li>
        <li><a href="{{ url('/sweets') }}" class="block p-2 text-gray-800">Sweets</a></li>
        <li><a href="{{ url('/contact') }}" class="block p-2 text-gray-800">Contact</a></li>
        <li><a href="{{ route('favorites.index') }}" class="text-gray-800 hover:text-blue-500">My Favorites</a></li>
    </ul>
                @guest
            <div class="py-2 px-4 space-y-2">
                <a href="{{ route('login') }}" class="block p-2 border border-gray-400 rounded text-center">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block p-2 border border-gray-400 rounded text-center">Register</a>
                @endif
            </div>
            @endguest


    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="px-4">
            @auth
            <div class="font-medium text-base text-gray-800">{{ optional(Auth::user())->name }}</div>
    
            <div class="font-medium text-sm text-gray-500">{{optional( Auth::user())->email }}</div>
            @endauth
        </div>

        <div class="mt-3 space-y-1">
            @auth
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
            @endauth
        </div>
    </div>
</div>

</nav>
