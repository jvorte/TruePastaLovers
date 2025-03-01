<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController;

// routes/web.php

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/favorites/{recipe}', [FavoriteController::class, 'store'])->name('favorites.add');
Route::delete('/favorites/{recipe}', [FavoriteController::class, 'destroy'])->name('favorites.remove');


Route::get('/', function () { return view('welcome');});

Route::get('/all_recipes', [RecipeController::class, 'index'])->name('all_recipes');

Route::get('/vegetarian', function () {
    return view('vegetarian');
});

Route::get('/sweets', function () {
    return view('sweets');
});

Route::get('/wines', function () {
    return view('wines');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');

Route::middleware('auth')->group(function () {

  
   
    
    Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

Route::resource('recipes', RecipeController::class);

    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
