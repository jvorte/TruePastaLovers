<x-app-layout>
    <div class="max-w-4xl mt-8 mx-auto p-6 bg-white shadow-md rounded-lg">
        <!-- Τίτλος συνταγής -->
        <h1 class="text-3xl font-bold text-center text-gray-800">{{ $recipe->title }}</h1>

        <!-- Εικόνα -->
        <div class="flex justify-center mt-4">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image"
                class="w-full max-w-4xl h-72 object-cover rounded-md shadow-md">
        </div>

        <!-- Περιγραφή -->
        <p class="text-gray-700 text-center mt-2 italic">{{ $recipe->description }}</p>

        <!-- Υλικά & Οδηγίες -->
        <div class="flex flex-col md:flex-row md:space-x-6 space-y-6 md:space-y-0 mt-6">
            <!-- Υλικά -->
            <div class="md:w-1/2 bg-gray-100 p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-gray-900">📝 Ingredients</h2>
                <ul class="list-disc list-inside mt-2 text-gray-700">
                    @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                        <li>{{ $ingredient }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Οδηγίες -->
            <div class="md:w-1/2 bg-gray-100 p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-gray-900">👨‍🍳 Instructions</h2>
                <ol class="list-decimal list-inside mt-2 text-gray-700">
                    @foreach(explode("\n", $recipe->instructions) as $step)
                        <li class="mt-1">{{ $step }}</li>
                    @endforeach
                </ol>
            </div>
        </div>

        <!-- Διαδραστικά κουμπιά -->
        <div class="flex justify-between mt-6">
            <button onclick="window.print()"
                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 transition">
                🖨 Print Recipe
            </button>

            @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('recipes.edit', $recipe->id) }}"
                    class="px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600 transition">
                    ✏ Edit Recipe
                </a>
            @endif
            @endauth
        </div>
    </div>
</x-app-layout>
