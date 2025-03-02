<x-app-layout>
    <div class="container mx-auto py-8 pageMainTitle text-center">
        <p class="text-3xl md:text-4xl lg:text-5xl">Favorites</p>
        <span class="text-1xl md:text-2xl lg:text-2xl">from True Pasta Lovers</span>

        @if($favorites->isEmpty())
            <p class="text-center text-gray-600">Δεν έχετε προσθέσει ακόμα αγαπημένες συνταγές!</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($favorites as $favorite)
                    <div class="bg-white p-5 shadow-md rounded-lg hover:shadow-lg transition">
                        <div class="w-full h-48 overflow-hidden rounded-md mb-4">
                            <img src="{{ asset('storage/' . optional($favorite->recipe)->image) }}" alt="Recipe Image"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold text-center">{{ optional($favorite->recipe)->title ?? 'Χωρίς τίτλο' }}
                        </h3>
                        <p class="text-sm text-gray-600 text-center">
                            {{ optional($favorite->recipe)->type ?? 'Άγνωστη κατηγορία' }}</p>
                        <div class="flex justify-center mt-4">

                            <a href="{{ route('recipes.show', $favorite->recipe->id ?? '#') }}"
                                class="flex items-center space-x-2 text-slate-500 hover:underline text-md">
                                <img src="siteImages/view.svg" alt="View Recipe" class="w-5 h-5">
                                View Recipe
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>