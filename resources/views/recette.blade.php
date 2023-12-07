<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/main.js'])
</head>
<body>

    @isset($donnees)
    
    <div class="container is-fluid">
        <div class="columns">
            <div class="column is-half">

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
            <div class="column is-half">
                <img alt="Crêpes sucrées" class="imgRecipe" fetchpriority="high" height="660" src="https://img.cuisineaz.com/660x660/2015/05/26/i98246-crepes-sucrees.jpg" width="660">
            </div>
    </div>

    @endisset
    
</body>
</html>