




<div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
    <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
   
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image" class="w-full h-full object-cover">
    </div>
    <div class="p-4">
      <h6 class="mb-2 text-slate-800 text-xl font-semibold">
        {{ $recipe->title }}
      </h6>
      <p class="text-slate-600 leading-normal font-light">
        {{ $recipe->description }}
      </p>
    </div>
    <div class="px-4 pb-4 pt-0 mt-2">
        <a href="{{ route('recipes.show', $recipe->id) }}" class="flex items-center justify-center space-x-2 text-blue-500 hover:underline text-sm">
            <img src="siteImages/view.svg" alt="View Recipe" class="w-5 h-5"> <!-- Μικρότερο εικονίδιο -->
            <span>View Recipe</span>
        </a>
        @auth
        @if(!Auth::user()->favorites->contains('recipe_id', $recipe->id))
            <!-- Προσθήκη στα αγαπημένα -->
            <form action="{{ route('favorites.add', $recipe->id) }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center justify-center space-x-2 text-gray-500 hover:text-red-500 text-sm">
                    <img src="siteImages/heart-.svg" alt="Add to Favorites" class="w-5 h-5"> <!-- Μικρότερο εικονίδιο -->
                    <span>Add to Favorites</span>
                </button>
            </form>
        @else
            <!-- Αφαίρεση από τα αγαπημένα -->
            <form action="{{ route('favorites.remove', $recipe->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center justify-center space-x-2 text-red-500 text-sm">
                    <img src="siteImages/heart.svg" alt="Remove from Favorites" class="w-5 h-5"> <!-- Μικρότερο εικονίδιο -->
                    <span>Remove from Favorites</span>
                </button>
            </form>
        @endif
        @endauth

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