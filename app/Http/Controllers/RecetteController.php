<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetteController extends Controller
{
    
public function sendData()
{
    $data = json_decode(file_get_contents('chemin/vers/ton_fichier.json'), true);

    $response = Http::post('http://recette.com/endpoint', $data);

    return $response->json();
}
/*
    const url = 'votre_url/recette';
    const donnees = {
      parametre1: 'valeur1',
      parametre2: 'valeur2',
      // Ajoutez d'autres paramètres selon vos besoins
    };
    
    fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json', // Assurez-vous d'ajuster le type de contenu en fonction de ce que le serveur attend
      },
      body: JSON.stringify(donnees),
    })
      .then(response => response.json())
      .then(data => console.log(data))
      .catch(error => console.error('Erreur :', error));
    

    public function form()
    {
        return view("fromIngredient");
    }
*/
    public function afficher(Request $request)
    {

       

       
        $donnees = [
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
        ];

        return view('recette', ['donnees'  => $donnees]); // Transmet les données à la vue
    }

    public function afficher2(Request $request)
    {

       

        $donnees = $request->all(); // Récupère toutes les données envoyées

      

        return view('recette', ['donnees'  => $donnees]); // Transmet les données à la vue
    }





}