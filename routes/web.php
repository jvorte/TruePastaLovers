<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {



Route::resource('recipes', RecipeController::class);

    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
