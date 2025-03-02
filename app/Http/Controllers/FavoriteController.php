<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Favorite;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}

  
    public function store($recipeId)
    {
        $user = Auth::user();

        // Ελέγχουμε αν υπάρχει ήδη στα favorites
        if (!$user->favorites()->where('recipe_id', $recipeId)->exists()) {
            Favorite::create([
                'user_id' => $user->id,
                'recipe_id' => $recipeId,
            ]);
        }

        return back()->with('success', 'Η συνταγή προστέθηκε στα αγαπημένα!');
    }

    public function destroy($recipeId)
    {
        $user = Auth::user();
        $user->favorites()->where('recipe_id', $recipeId)->delete();

        return back()->with('success', 'Η συνταγή αφαιρέθηκε από τα αγαπημένα!');
    }
    public function index()
    {
        $favorites = Favorite::with('recipe')->where('user_id', Auth::id())->get();
        
        return view('favorites.index', compact('favorites'));
    }

    public function create(array $attributes = []): Favorite
    {
        return Favorite::create($attributes);
    }
}
