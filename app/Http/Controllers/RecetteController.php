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
        $donnees = $request->input('recipe');
        $donneesArray = json_decode($donnees, true);
        return view('recette', ['donnees'  => $donneesArray]); // Transmet les données à la vue
    }

    public function afficher2(Request $request)
    {
        $donnees = '{
            "titre": "Crêpes",
            "description": "Dégustez de délicieuses crêpes faites maison pour le petit-déjeuner ou le goûter.",
            "ingredients": [
                "250g de farine",
                "4 œufs",
                "500ml de lait",
                "30g de sucre"
            ],
            "type": "dessert",
            "regime": "omnivore",
            "temps": "30 minutes",
            "poids": "180 calories par portion",
            "instructions": [
                "Dans un grand bol, tamisez la farine puis ajoutez-y le sucre.",
                "Cassez les œufs un par un et incorporez-les à la farine en mélangeant avec un fouet.",
                "Versez progressivement le lait tout en continuant de remuer jusqu\'à obtenir une pâte lisse et homogène.",
                "Laissez reposer la pâte pendant 10 minutes.",
                "Faites chauffer une poêle antiadhésive à feu moyen et ajoutez un peu de beurre pour éviter que les crêpes ne collent.",
                "Versez une louche de pâte dans la poêle et étalez-la uniformément en inclinant la poêle en mouvements circulaires.",
                "Laissez cuire la crêpe pendant environ 2 minutes jusqu\'à ce que les bords commencent à dorer, puis retournez-la à l\'aide d\'une spatule et laissez cuire l\'autre côté pendant 1 minute.",
                "Répétez l\'opération avec le reste de la pâte jusqu\'à ce qu\'il n\'en reste plus.",
                "Servez les crêpes chaudes avec la garniture de votre choix : sucre, sirop d\'érable, miel, confiture, Nutella, fruits frais, etc.",
                "Cette recette donne environ 8 crêpes, selon leur taille."
            ],
            "portions": "8"
        }';
        
        // Convertir la chaîne JSON en tableau associatif
        $donneesArray = json_decode($donnees, true);
        return view('recette', ['donnees'  => $donneesArray]); // Transmet les données à la vue
    }
}

        