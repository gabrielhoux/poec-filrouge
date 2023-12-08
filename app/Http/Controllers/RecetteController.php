<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function form()
    {
        $ingredients = Ingredient::pluck('name');
        return view('main', ['ingredients' => $ingredients]);
    }
    
    public function afficher(Request $request)
    {
        $recipe = $request->input('recipe');
        return view('recette', ['donnees'  => $recipe]); // Transmet les données à la vue
    }
}

        // Exemple du format des données
        /*         $donnees = [
            "titre"  => "Crêpes sucrées",
            "ingredients" => [
                "farine",
                "œufs",
                "lait",
                "sucre"
            ],
            "type" => "dessert",
            "regime" => "omnivore",
            "temps" => "20 minutes",
            "poids" => "150 calories par portion",
            "instructions" => [
                "Dans un grand bol, mélangez 250g de farine et 50g de sucre.",
                "Ajoutez 3 œufs et mélangez jusqu'à obtenir une pâte homogène.",
                "Versez progressivement 500ml de lait tout en continuant de mélanger.",
                "Laissez reposer la pâte pendant 15 minutes.",
                "Faites chauffer une poêle antiadhésive à feu moyen.",
                "Versez une louche de pâte dans la poêle chaude et étalez-la rapidement en formant un cercle.",
                "Laissez cuire la crêpe pendant environ 2 minutes de chaque côté, jusqu'à ce qu'elle soit dorée.",
                "Répétez l'opération avec le reste de la pâte.",
                "Servez les crêpes saupoudrées de sucre ou avec votre garniture préférée."
            ],
            "portions" => "4"
        ]; */