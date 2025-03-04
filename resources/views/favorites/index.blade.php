<x-app-layout>
    <div class="max-w-6xl mx-auto pageMainTitle text-center">
        <p class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900">Favorites</p>
        <span class="text-1xl md:text-2xl lg:text-2xl">from True Pasta Lovers</span>

        @if($favorites->isEmpty())
            <p class="text-center text-gray-600 mt-8 ">You haven't added any favorite recipes yet!</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 pt-7 gap-6">
                @foreach($favorites as $favorite)
                    <div class="bg-white p-5 shadow-md rounded-lg hover:shadow-lg transition">
                        <div class="w-full h-48 overflow-hidden rounded-md mb-4">
                            <img src="{{ asset('storage/' . optional($favorite->recipe)->image) }}" alt="Recipe Image"
                                class="w-full h-full object-cover">
                        </div>
                        @auth
                            @if(!Auth::user()->favorites->contains('recipe_id', $favorite->recipe->id))
                                <!-- Μόνο αν η συνταγή δεν είναι στα αγαπημένα -->
                                <form action="{{ route('favorites.add', $favorite->recipe->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center justify-center space-x-2 hover:text-red-500 text-sm">
                                        <img src="siteImages/heart-.svg" alt="Add to Favorites" class="w-5 h-5">
                                        <span>Add to Favorites</span>
                                    </button>
                                </form>
                            @else
                                <!-- Αν η συνταγή είναι ήδη στα αγαπημένα -->
                                <form action="{{ route('favorites.remove', $favorite->recipe->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center text-center justify-center space-x-2 text-red-500 text-sm mb-3">
                                        <img src="siteImages/heart.svg" alt="Remove from Favorites" class="w-5 h-5">
                                        <p>Remove from Favorites</p>
                                    </button>
                                </form>
                            @endif
                        @else
                            <!-- Αν ο χρήστης δεν είναι συνδεδεμένος, δείχνουμε το κουμπί login -->
                            <a href="{{ route('login') }}" class="text-slate-500 hover:underline">
                                <span>Add to Favorites <img src="siteImages/heart-.svg" alt="Add to Favorites" class="float-right ms-3 w-5 h-5"></span>
                            </a>
                        @endauth
                        <h3 class="text-xl font-semibold text-center">{{ optional($favorite->recipe)->title ?? 'Χωρίς τίτλο' }}</h3>
                        <p class="text-sm text-gray-600 text-center">{{ optional($favorite->recipe)->type ?? 'Άγνωστη κατηγορία' }}</p>
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

        {{-- Footer --}}
        <div class="mt-10 text-center text-sm text-gray-500">
            <p>&copy; 2025 True Pasta Lovers. All rights reserved.</p>
        </div>
</x-app-layout>