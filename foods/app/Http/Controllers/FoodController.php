<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        return response()->json(Food::with('ingredients')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredients' => 'required|array|min:1',
            'ingredients.*' => 'exists:ingredients,id',
        ]);

        $food = Food::create($request->only(['name', 'description']));
        $food->ingredients()->attach($request->input('ingredients'));

        return response()->json($food->load('ingredients'), 201);
    }

    public function listIngredients()
    {
        return response()->json(Ingredient::all());
    }

    public function searchByIngredient($ingredient)
    {
        $foods = Food::whereHas('ingredients', function ($query) use ($ingredient) {
            $query->where('name', 'like', '%' . $ingredient . '%');
        })->with('ingredients')->get();

        return response()->json($foods);
    }
}