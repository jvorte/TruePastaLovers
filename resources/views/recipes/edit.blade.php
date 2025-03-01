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
                <label for="ingredients" class="block text-gray-700">Ingredients:</label>
                <textarea name="ingredients" id="ingredients" class="w-full p-2 border border-gray-300 rounded-md">{{ $recipe->ingredients }}</textarea>
            </div>
            <div class="mb-4">
                <label for="instructions" class="block text-gray-700">Instructions:</label>
                <textarea name="instructions" id="instructions" class="w-full p-2 border border-gray-300 rounded-md">{{ $recipe->instructions }}</textarea>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700">Type:</label>
                <input type="text" name="type" id="type" value="{{ $recipe->type }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image:</label>
                <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Recipe</button>
        </form>
    </div>
</x-app-layout>