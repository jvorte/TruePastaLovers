<!-- resources/views/favorites/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-semibold mb-4">My Favorites</h1>

        @if($favorites->isEmpty())
            <p>You have no favorite recipes yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($favorites as $favorite)
                    <div class="p-4 border rounded-md">
                        <img src="{{ asset('storage/' . $favorite->recipe->image) }}" alt="Recipe Image" class="w-full h-48 object-cover rounded-md mb-4">
                        <h3 class="text-lg font-semibold">{{ $favorite->recipe->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $favorite->recipe->type }}</p>
                        <a href="{{ route('recipes.show', $favorite->recipe->id) }}" class="text-blue-500 hover:underline mt-2 inline-block">View Recipe</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
