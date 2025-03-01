<div class="p-5 flex flex-col items-center text-center">
    <!-- Εικόνα με σταθερό μέγεθος -->
    <div class="w-64 h-64 overflow-hidden rounded-md mb-4">
        <img src="{{ asset('storage/' . $recipe->image) }}" 
             alt="Recipe Image" 
             class="w-full h-full object-cover">
    </div>
    
    <!-- Τίτλος συνταγής -->
    <h3 class="text-xl font-semibold text-center w-full">{{ $recipe->title }}</h3>

    <!-- Τύπος -->
    <p class="text-sm text-gray-600 text-center w-full">{{ $recipe->type }}</p>
    
    <!-- Προβολή συνταγής -->
    <a href="{{ route('recipes.show', $recipe->id) }}" class="mt-4 inline-block text-blue-500 hover:underline text-center">View Recipe</a>

    @auth
    @if(Auth::user()->isAdmin())
        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="mt-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-md text-red-500">Delete</button>
        </form>
    @endif
    @endauth
    @auth
    @if(!Auth::user()->favorites->contains('recipe_id', $recipe->id))
        <form action="{{ route('favorites.add', $recipe->id) }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center space-x-2 text-gray-500 hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M5.121 19.364l-.707-.707a5.5 5.5 0 010-7.778l7.778-7.778a5.5 5.5 0 017.778 7.778l-7.778 7.778a5.5 5.5 0 01-7.778 0z" />
                </svg>
                <span>Add to Favorites</span>
            </button>
        </form>
    @else
        <form action="{{ route('favorites.remove', $recipe->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="flex items-center space-x-2 text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M5.121 19.364l-.707-.707a5.5 5.5 0 010-7.778l7.778-7.778a5.5 5.5 0 017.778 7.778l-7.778 7.778a5.5 5.5 0 01-7.778 0z" />
                </svg>
                <span>Remove from Favorites</span>
            </button>
        </form>
    @endif
@endauth

</div>
