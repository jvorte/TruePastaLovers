<x-app-layout>
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-6 text-center">Τα Αγαπημένα Σας</h2>

        @if($favorites->isEmpty())
            <p class="text-center text-gray-600">Δεν έχετε προσθέσει ακόμα αγαπημένες συνταγές!</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($favorites as $favorite)
                    <div class="bg-white p-5 shadow-md rounded-lg hover:shadow-lg transition">
                        <div class="w-full h-48 overflow-hidden rounded-md mb-4">
                            <img src="{{ asset('storage/' . optional($favorite->recipe)->image) }}" 
                                 alt="Recipe Image" 
                                 class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold text-center">{{ optional($favorite->recipe)->title ?? 'Χωρίς τίτλο' }}</h3>
                        <p class="text-sm text-gray-600 text-center">{{ optional($favorite->recipe)->type ?? 'Άγνωστη κατηγορία' }}</p>
                        <div class="flex justify-center mt-4">
                            <a href="{{ route('recipes.show', $favorite->recipe->id ?? '#') }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 transition">
                                Δείτε Συνταγή
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>


