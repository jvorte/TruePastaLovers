<x-app-layout>
    <div class="p-5 flex flex-col md:flex-row items-center text-center">
        <!-- Αριστερή στήλη -->
        <div class="md:w-1/2 p-5 flex flex-col items-center">
            <!-- Εικόνα -->
            <div class="flex justify-center items-center max-h-1/2 mb-4">
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image" class="w-full h-full object-cover rounded-md">
            </div>
            
            <!-- Τίτλος συνταγής -->
            <h3 class="text-xl font-semibold w-full text-center">{{ $recipe->title }}</h3>

            <!-- Τύπος -->
            <p class="text-sm text-gray-600 w-full text-center">{{ $recipe->type }}</p>
        </div>

        <!-- Δεξιά στήλη --> 
        <div class="md:w-1/2 p-5 flex flex-col items-center">
            <!-- Οδηγίες -->
            <h1>sfdafdswf</h1>
            <p class="text-1xl font-semibold w-full text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora neque, 
                nihil illo ullam aut ducimus eius vero impedit dolorum aliquid libero iste. Atque, neque corrupti quaerat architecto inventore 
                quae cupiditate in minima sit, nulla magnam impedit! In, distinctio reprehenderit aperiam nam nulla consectetur laudantium iste? 
                Temporibus et error illo non dolorum? Perspiciatis quos obcaecati quam, soluta, impedit asperiores at enim quas cupiditate culpa ullam 
                est eligendi velit! Harum, repudiandae quas veritatis aspernatur dolore esse nobis, fugiat sunt nemo fuga itaque aut error illum odio asperiores, maxime alias eum id voluptate! Maxime, tempore! Totam, excepturi recusandae nulla fugit, eius fugiat sed eveniet quo soluta ea, qui porro corrupti officia possimus hic voluptates consequatur facilis. Dolores corrupti adipisci amet sit minus minima est necessitatibus hic ea? Eius totam reprehenderit harum cupiditate dolor, eum a! Perspiciatis corporis nihil nostrum hic repellat? Tempore, sit. Nisi placeat error vero, quis laboriosam porro rem? Architecto, deleniti!</p>
            <p class="text-md text-gray-800 w-full text-center">{{ $recipe->instructions }}</p>

            @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('recipes.edit', $recipe->id) }}" class="mt-4 inline-block text-blue-500 hover:underline text-center">Edit Recipe</a>
            @endif
            @endauth
        </div>
    </div>
</x-app-layout>
