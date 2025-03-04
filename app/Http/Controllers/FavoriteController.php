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
        // Αυτό το middleware φροντίζει να στείλει τον χρήστη στο login αν δεν είναι συνδεδεμένος
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

        return back()->with('success', 'Η recipe added to favorites!');
    }

    public function destroy($recipeId)
    {
        $user = Auth::user();
        $user->favorites()->where('recipe_id', $recipeId)->delete();

        return back()->with('success', 'Η recipe removed from favorites!');
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

