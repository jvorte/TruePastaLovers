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
            'description' => 'required',   
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
            'description' => $request->description, 
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
        // Validate the input
        $request->validate([
            'title' => 'required',
            'description' => 'required',  
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'type' => 'required',
        ]);
    
        // Find the recipe by ID
        $recipe = Recipe::find($id);
    
        // Check if the recipe exists
        if (!$recipe) {
            return redirect()->route('recipes.index')->with('error', 'Recipe not found.');
        }
    
        // If there is a new image, store it
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $recipe->image = $imagePath;
        }
    
        // Update the recipe data
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;
        $recipe->type = $request->type;
        
        // Save the changes
        $recipe->save();

        try {
            $recipe->save();
        } catch (\Exception $e) {
            return redirect()->route('recipes.edit', $id)->with('error', 'Error saving the recipe: ' . $e->getMessage());
        }
    
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

    public function wines()
{
    $recipes = Recipe::where('type', 'wines')->get();
    return view('wines', compact('recipes'));
    
}
public function pasta()
{
    $recipes = Recipe::where('type', 'pasta')->get();
    return view('pasta', compact('recipes'));
    
}
public function sweets()
{
    $recipes = Recipe::where('type', 'sweets')->get();
    return view('sweets', compact('recipes'));
    
}

public function vegetarian()
{
    $recipes = Recipe::where('type', 'vegetarian')->get();
    return view('vegetarian', compact('recipes'));
    
}

}