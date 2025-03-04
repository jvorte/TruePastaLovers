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

  <div class="max-w-6xl mx-auto p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6">
          @foreach ($recipes as $recipe)
              <!-- Use the RecipeCard component -->
              <x-recipe-card :recipe="$recipe" />
          @endforeach
      </div>
  </div>

      {{-- Footer --}}
      <div class="mt-10 text-center text-sm text-gray-500">
        <p>&copy; 2025 True Pasta Lovers. All rights reserved.</p>
    </div>
</x-app-layout>
