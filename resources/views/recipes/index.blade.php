@extends('layouts.app')

@section('content')
    <h1>All Recipes</h1>
    <ul>
        @foreach ($recipes as $recipe)
            <li><a href="{{ route('recipes.show', $recipe->id) }}">{{ $recipe->title }}</a></li>
        @endforeach
    </ul>
    <a href="{{ route('recipes.create') }}">Create a new recipe</a>
@endsection
