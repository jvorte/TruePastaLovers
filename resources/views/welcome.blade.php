<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TruePastaLovers</title>
        <link rel="icon" href="siteImages/logo.png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
       
        @endif
    </head>
    <body class="bg-gray-100  text-[#1b1b18] flex p-2 lg:p-2 items-center lg:justify-center min-h-screen flex-col">
    
        <header class="w-full lg:max-w-7xl max-w-[355px] text-sm mb-6">
            @if (Route::has('login'))
                <nav class="flex items-center justify-between">
                    <!-- Logo -->
            
                    <a href="{{ url('/') }}" class="text-xl font-bold">True Pasta Lovers</a>
    
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

                    <!-- Hamburger Button for Mobile -->
                    <button class="lg:hidden p-2 focus:outline-none" id="menu-toggle">
                        ☰
                    </button>

                <!-- Navigation Links -->
                    <ul id="menu" class="hidden lg:flex gap-2 flex-col lg:flex-row absolute lg:static bg-gray-100  p-4 lg:p-0 w-full lg:w-auto top-16 left-0 shadow-lg lg:shadow-none">
                        <li><a href="{{ url('/') }}" class="block p-2 text-[15px] lg:text-[16px] hover:text-red-500">Home</a></li>
                        <li><a href="{{ url('/about') }}" class="block p-2 text-[15px] lg:text-[16px] hover:text-red-500">About</a></li>
                        <li><a href="{{ url('/all_recipes') }}" class="block p-2 text-[15px] lg:text-[16px] hover:text-red-500">All Recipes</a></li>
                        <li><a href="{{ url('/vegetarian') }}" class="block p-2 text-[15px] lg:text-[16px] hover:text-red-500">Vegetarian</a></li>
                        <li><a href="{{ url('/pasta') }}" class="block p-2 text-[15px] lg:text-[16px] hover:text-red-500">Pasta</a></li>
                        <li><a href="{{ url('/wines') }}" class="block p-2 text-[15px] lg:text-[16px] hover:text-red-500">Wines</a></li>
                        <li><a href="{{ url('/sweets') }}" class="block p-2 text-[15px] lg:text-[16px] hover:text-red-500">Sweets</a></li>                       
                        <li><a href="{{ route('favorites.index') }}" class="block p-2 text-[15px] lg:text-[16px] hover:text-red-500">My Favorites</a></li>
                        <li><a href="{{ url('/contact') }}" class="block p-2 text-[15px] lg:text-[16px] hover:text-red-500">Contact</a></li>
                        @auth
                        
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="block  text-[15px] lg:text-[16px] p-2 border border-gray-400 rounded">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="block  text-[15px] lg:text-[16px] p-2 border border-gray-400 rounded">Register</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </nav>
            @endif
        </header>
    
    
        <div class="flex justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0 pt-7">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:p-[8px]">
                        <p class="text-3xl md:text-4xl lg:text-5xl">Welcome to</p>
                        <h1 class="text-5xl md:text-6xl lg:text-8xl font-extrabold">True Pasta Lovers</h1>
                        <p class="text-base md:text-lg lg:text-lg">If you’re a true pasta enthusiast, you know there’s nothing quite like the perfect plate of pasta. Whether it's the comforting simplicity of spaghetti aglio e olio or the indulgence of a rich, creamy Alfredo, pasta is more than just a meal...it's a passion.</p>

                        <a href="{{ url('about') }}" class="float-left bg-red-500 text-white  mt-6 text-[15px] lg:text-[16px] p-2 rounded">About us...</a>

                    </div>
                    
                    <div class="pt-7">
                        <img src="/siteImages/pasta1.png" alt="" class="max-w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    
        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
        {{-- Footer --}}
        <div class="mt-10 text-center text-sm text-gray-500">
            <p>&copy; 2025 True Pasta Lovers. All rights reserved.</p>
        </div>
     
        <script>
            document.getElementById('menu-toggle').addEventListener('click', function() {
                document.getElementById('menu').classList.toggle('hidden');
            });
        </script>
    </body>
    
</html>
