<x-app-layout>
    {{-- main title on page --}}
    <div class="pageMainTitle text-center">
        <p class="text-3xl md:text-4xl lg:text-5xl">All Recipes <span class="text-1xl md:text-2xl lg:text-3xl">from True Pasta Lovers</span> </p>
        @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ url('/recipes/create') }}" class="text-md">+ new</a>
            @endif
        @endauth
    </div>


        <div class="container mx-auto p-6">
        
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6">
                @foreach ($recipes as $recipe)
                    <!-- Χρήση του RecipeCard component -->
                    <x-recipe-card :recipe="$recipe" />
                @endforeach
            </div>
        </div>
</x-app-layout>