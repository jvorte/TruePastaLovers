<x-app-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
            @csrf
            
            <h2 class="text-xl font-bold mb-4 text-center">Create a Recipe</h2>

            <label for="title" class="block font-medium">Title of Recipe:</label>
            <input type="text" name="title" id="title" required class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
            
            <label for="ingredients" class="block font-medium">Ingredients:</label>
            <textarea name="ingredients" id="ingredients" required class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4"></textarea>
            
            <label for="instructions" class="block font-medium">Instructions:</label>
            <textarea name="instructions" id="instructions" required class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4"></textarea>
            
            <label for="image" class="block font-medium">Image:</label>
            <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded-md mb-4">
            
            <label for="type" class="block font-medium">Type:</label>
            <select name="type" id="type" required class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                <option value="Pasta">Pasta</option>
                <option value="Vegetarian">Vegetarian</option>
                <option value="Wines">Wines</option>
                <option value="Sweets">Sweets</option>
            </select>
            
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">Create Recipe</button>
        </form>
    </div>
</x-app-layout>
