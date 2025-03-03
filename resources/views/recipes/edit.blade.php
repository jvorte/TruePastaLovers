<x-app-layout>
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-semibold text-center mb-5">Edit Recipe</h1>
        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title:</label>
                <input type="text" name="title" id="title" value="{{ $recipe->title }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <input type="text" name="description" id="description" value="{{ old('description', $recipe->description) }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="ingredients" class="block text-gray-700">Ingredients:</label>
                <textarea name="ingredients" id="ingredients" class="w-full p-2 border border-gray-300 rounded-md">{{ $recipe->ingredients }}</textarea>
            </div>
            <div class="mb-4">
                <label for="instructions" class="block text-gray-700">Instructions:</label>
                <textarea name="instructions" id="instructions" class="w-full p-2 border border-gray-300 rounded-md">{{ $recipe->instructions }}</textarea>
            </div>
     
            <label for="type" class="block font-medium">Type:</label>
            <select name="type" id="type" value="{{ $recipe->type }}" required class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                <option value="Pasta">Pasta</option>
                <option value="Vegetarian">Vegetarian</option>
                <option value="Wines">Wines</option>
                <option value="Sweets">Sweets</option>
            </select>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image:</label>
                <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Recipe</button>
        </form>
    </div>
</x-app-layout>