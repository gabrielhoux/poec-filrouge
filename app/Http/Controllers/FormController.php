<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class RecetteController extends Controller
{
    public function traiterRecette(Request $request)
    {
        $recette = $request->input('recette');
        // Faites quelque chose avec les données de la recette, par exemple, enregistrez-les dans la base de données

        return response()->json(['message' => 'Recette traitée avec succès']);
    }
}


/*class FormController extends Controller
{
    public function traiterFormulaire(Request $request)
    {
        // Récupérer les données du formulaire
        $donneesFormulaire = $request->all();

        // Faire quelque chose avec les données (enregistrement en base de données, etc.)

        // Rediriger ou renvoyer une réponse
        return redirect('/')->with('success', 'Formulaire traité avec succès');
    }
}
*/