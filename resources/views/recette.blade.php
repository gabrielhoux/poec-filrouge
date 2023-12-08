<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    @vite(['resources/css/app.css', 'resources/js/main.js'])
</head>
<body>

    @isset($donnees)
    
    <div class="container is-fluid">
        <div class="columns">
            <div class="column is-two-third">

                <div class="content">

                    <h1 id="recipeTitle" class="title">{{ $donnees['titre'] }}</h1>

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

            </div>

            <div class="column is-one-third">
                <figure id="imgContainer" class="image is-2by3">
                    <img class="imgRecipe" src="https://img.lemde.fr/2022/02/10/145/184/1183/788/1440/960/60/0/711057b_169085-3259764.jpg">
                </figure>
            </div>
    </div>

    @endisset
    
</body>
</html>