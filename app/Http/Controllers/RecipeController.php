<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        try {
            $recipes = Recipe::all();  // Fetch all recipes
            return view('all_recipes', compact('recipes'));  // Pass recipes to the view
        } catch (\Exception $e) {
            dd($e->getMessage());  // Display error if any
        }
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

    public function edit($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',     
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Επιπλέον έλεγχος για την εικόνα
            'type' => 'required',
        ]);

        $recipe = Recipe::find($id);

        // Αν υπάρχει νέα εικόνα, αποθήκευσέ την
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $recipe->image = $imagePath;
        }

        // Ενημέρωση της συνταγής
        $recipe->title = $request->title;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;
        $recipe->type = $request->type;
        $recipe->save();

        return redirect()->route('recipes.show', $recipe->id);
    }

    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        if ($recipe) {
            $recipe->delete();
        }
        return redirect()->route('all_recipes');
    }
}