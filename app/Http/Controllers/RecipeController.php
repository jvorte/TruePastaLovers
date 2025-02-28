<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',     
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Επιπλέον έλεγχος για την εικόνα
            'type' => 'required',
        ]);
    
        // Αν υπάρχει εικόνα, αποθήκευσέ την
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
    
        // Δημιουργία της συνταγής με το αποθηκευμένο path της εικόνας
        Recipe::create([
            'title' => $request->title,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'image' => $imagePath, // Αποθήκευση του path της εικόνας
            'type' => $request->type,
        ]);
    
        return redirect()->route('all_recipes');
    }
    
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.show', compact('recipe'));
    }
}