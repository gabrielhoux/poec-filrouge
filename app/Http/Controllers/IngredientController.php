<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            "name"=> ["required","string", "min:2"],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $data = $validator->validated();

        $data["name"] = ucfirst(strtolower($data["name"]));

        $ingredient = Ingredient::create($data);

        return response()->json($ingredient, 200);
    }

    // Affiche un ingrédient spécifique
    public function show($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return response()->json($ingredient, 200);
    }

    // Efface un ingrédient spécifique de la base de données
    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete($id);
        return response()->json($ingredient, 200);
    }
}
