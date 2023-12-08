<div>
    <h1>{{ $donnees['titre'] }}</h1>

    <!-- Affichez les autres données ici -->
    <div>
       <h2>Liste des ingredients</h2>
    <ul>

        @foreach($donnees['ingredients'] as $ingredient)
            <li>{{ $ingredient }}</li>
        @endforeach
    </ul>
   </div>
    <div>
    <ol>
        @foreach($donnees['instructions'] as $instruction)
        <li>{{ $instruction }}</li>
        @endforeach
    </ol>

    </div>
</div>

class RecetteController extends Controller
{
    public function traiterRecette(Request $request)
    {
        $recette = $request->input('recette');
        // Faites quelque chose avec les données de la recette, par exemple, enregistrez-les dans la base de données

        return response()->json(['message' => 'Recette traitée avec succès']);
    }
}