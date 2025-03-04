<div class="relative flex flex-col md:flex-row w-full bg-white shadow-sm border border-slate-200 rounded-lg h-auto md:h-72">
    <div class="relative p-2.5 md:w-1/2 shrink-0 overflow-hidden">
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image" class="w-full h-full object-cover">
    </div>
    <div class="p-6 flex flex-col h-full">
        <div class="mb-4 rounded-full py-5.5 px-2.5 border border-transparent text-xs transition-all shadow-xl text-center">

            @auth
                @if(!Auth::user()->favorites->contains('recipe_id', $recipe->id))
                    <!-- Μόνο αν η συνταγή δεν είναι στα αγαπημένα -->
                    <form action="{{ route('favorites.add', $recipe->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center justify-center space-x-2 hover:text-red-500 text-sm">
                            <img src="siteImages/heart-.svg" alt="Add to Favorites" class="w-5 h-5">
                            <span>Add to Favorites</span>
                        </button>
                    </form>
                @else
                    <!-- Αν η συνταγή είναι ήδη στα αγαπημένα -->
                    <form action="{{ route('favorites.remove', $recipe->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center justify-center space-x-2 text-red-500 text-sm">
                            <img src="siteImages/heart.svg" alt="Remove from Favorites" class="w-5 h-5">
                            <span>Remove from Favorites</span>
                        </button>
                    </form>
                @endif
            @else
                <!-- Αν ο χρήστης δεν είναι συνδεδεμένος, δείχνουμε το κουμπί login -->
             <a href="{{ route('login') }}" class="text-slate-500 hover:underline  "> <span>Add to Favorites <img src="siteImages/heart-.svg" alt="Add to Favorites" class="float-right ms-3 w-5 h-5"></span></a>
            @endauth

        </div>

        <h4 class="mb-2 text-slate-800 text-xl font-semibold">
            {{ $recipe->title }}
        </h4>
        <p class="mb-8 text-slate-600 leading-normal font-light">
            {{ $recipe->description }}
        </p>
        <div class="mt-auto">
            <a href="{{ route('recipes.show', $recipe->id) }}" class="flex items-center space-x-2 text-slate-500 hover:underline text-md">
                <img src="siteImages/view.svg" alt="View Recipe" class="w-5 h-5">
                <span>View Recipe</span>
            </a>
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
    </div>
</div>
