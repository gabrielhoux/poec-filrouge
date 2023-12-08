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
