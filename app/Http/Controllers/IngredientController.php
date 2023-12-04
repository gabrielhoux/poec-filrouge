<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    // Retourne tous les ingrédients
    public function index()
    {
        $ingredients = Ingredient::all();
        return response()->json($ingredients);
    }

    // Rentre un nouveau ingrédient dans la base de données
    public function store(Request $request)
    {
        $ingredient = Ingredient::create($request->only('name'));
        return response()->json($ingredient, 201);
    }

    // Affiche un ingrédient spécifique
    public function show(Ingredient $ingredient)
    {
        return response()->json($ingredient);
    }

    // Met à jour un ingrédient spécifique dans la base de données
    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->update($request->only('name'));
        return response()->json($ingredient);
    }

    // Efface un ingrédient spécifique de la base de données
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return response()->json(null, 204);
    }
}
