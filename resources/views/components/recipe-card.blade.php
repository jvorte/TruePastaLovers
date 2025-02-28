<div class="bg-white rounded-lg shadow-lg p-4">
    <!-- Εικόνα -->
    <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image" class="w-full h-48 object-cover rounded-md mb-4">
    
    <!-- Τίτλος συνταγής -->
    <h3 class="text-xl font-semibold">{{ $recipe->title }}</h3>

    <!-- Τύπος -->
    <p class="text-sm text-gray-600">{{ $recipe->type }}</p>
    
    <!-- Προβολή συνταγής -->
    <a href="{{ route('recipes.show', $recipe->id) }}" class="mt-4 inline-block text-blue-500 hover:underline">View Recipe</a>
</div>
