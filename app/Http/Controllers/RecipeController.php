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
            'image' => 'required',
            'type' => 'required',
        ]);

        Recipe::create($request->all());

        return redirect()->route('recipes.index');
    }

    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.show', compact('recipe'));
    }
}