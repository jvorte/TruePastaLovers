<!-- filepath: /e:/WebDevelopment Projects/PORTFOLIO PROJECTS/TruePastaLovers/resources/views/recipes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Recipe</h1>
        <form action="{{ route('recipes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Recipe Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection