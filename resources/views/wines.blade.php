<x-app-layout>
  {{-- Main Title on Page --}}
  <div class="pageMainTitle text-center">
      <p class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900">Wines</p>
      <span class="text-1xl md:text-2xl lg:text-2xl">from True Pasta Lovers</span>

      @auth
          @if(Auth::user()->isAdmin())
              <a href="{{ url('/recipes/create') }}" class="text-md">+ new</a>
          @endif
      @endauth
  </div>

  {{-- Display Recipes --}}
  {{-- <div class="container mx-auto p-6"> --}}
    <div class="max-w-6xl mx-auto p-6">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6">
          @foreach ($recipes as $recipe)
              <!-- Use the RecipeCard component -->
              <x-recipe-card :recipe="$recipe" />
          @endforeach
      </div>
  </div>
</x-app-layout>
