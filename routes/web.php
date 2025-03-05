<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\NewsletterController;

Route::post('/subscribe', [NewsletterController::class, 'store'])->name('newsletter.subscribe');


Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);


Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/contact', [ContactController::class, 'submitForm']);
// Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::post('/favorites/{recipe}', [FavoriteController::class, 'store'])->name('favorites.add');
Route::delete('/favorites/{recipe}', [FavoriteController::class, 'destroy'])->name('favorites.remove');

Route::get('/', function () { return view('welcome');});

Route::get('/all_recipes', [RecipeController::class, 'index'])->name('all_recipes');

Route::get('/vegetarian', function () { return view('vegetarian'); });

Route::get('/vegetarian', [RecipeController::class, 'vegetarian'])->name('recipes.vegetarian');
Route::get('/wines', [RecipeController::class, 'wines'])->name('recipes.wines');
Route::get('/sweets', [RecipeController::class, 'sweets'])->name('recipes.sweets');
Route::get('/pasta', [RecipeController::class, 'pasta'])->name('recipes.pasta');
Route::get('/about', function () { return view('about');})->name('about');
// εδω ειναι μην ξεχασω να βαλω τον κωδικα που εχω στο αρχειο web.php
// Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::resource('recipes', RecipeController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
