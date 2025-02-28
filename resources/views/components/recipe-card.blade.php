<div class="p-5 flex flex-col items-center text-center">
    <!-- Εικόνα -->
    <div class="flex justify-center items-center h-64 w-auto mb-4">
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image" class="max-w-full max-h-full object-cover rounded-md">
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
</div>
