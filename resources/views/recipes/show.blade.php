<x-app-layout>
    <div class="flex flex-col md:flex-row items-center text-center md:space-x-6 p-4">
        <!-- Αριστερή στήλη -->
        <div class="md:w-1/2 flex flex-col items-center space-y-4">
            <!-- Εικόνα -->
            <div class="flex justify-center items-center max-h-full h-96 rounded-md overflow-hidden w-full md:w-3/4">
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image" class="w-full h-auto object-contain rounded-md">
            </div>
            
            <!-- Τίτλος συνταγής -->
            <h3 class="text-xl font-semibold">{{ $recipe->title }}</h3>

            <!-- Τύπος -->
            <p class="text-sm text-gray-600">{{ $recipe->description }}</p>
        </div>

        <!-- Δεξιά στήλη --> 
        <div class="md:w-1/2 p-5 flex flex-col items-center space-y-4">
            <!-- Υλικά -->
            <h2 class="text-lg font-bold">Ingredients</h2>
            <p class="text-md text-gray-800">{{ $recipe->ingredients }}</p>
       
            <!-- Οδηγίες -->
            <h2 class="text-md font-bold">Ιnstructions</h2>
            <p class="text-md text-gray-800">{{ $recipe->instructions }}</p>

            @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('recipes.edit', $recipe->id) }}" class="mt-4 inline-block text-blue-500 hover:underline">Edit Recipe</a>
            @endif
            @endauth
        </div>
    </div>
</x-app-layout>
