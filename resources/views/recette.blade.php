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

                <div class="content is-small">

                    <div class="has-text-centered">
                        <h1 id="recipeTitle" class="title is-size-2">{{ $donnees['titre'] }}</h1>
                    </div>

                    <blockquote class="has-text-centered"><strong>{{ $donnees['description'] }}</strong></blockquote>

                    <nav class="level">
                        <div class="level-item has-text-centered">
                            <div>
                            <p class="title">Poids</p>
                            <p class="heading">{{ $donnees['poids'] }}</p>
                            </div>
                        </div>
                        <div class="level-item has-text-centered">
                            <div>
                            <p class="title">Temps</p>
                            <p class="heading">{{ $donnees['temps'] }}</p>
                            </div>
                        </div>
                        <div class="level-item has-text-centered">
                            <div>
                            <p class="title">Portions</p>
                            <p class="heading">{{ $donnees['portions'] }}</p>
                            </div>
                        </div>
                    </nav>
                    <h2 class="subtitle">Ingrédients</h2>
                    <ul>
                        @foreach($donnees['ingredients'] as $ingredient)
                        <li>{{ $ingredient }}</li>
                        @endforeach
                    </ul>
                    <h2 class="subtitle">Instructions</h2> 
                    <ol>
                        @foreach($donnees['instructions'] as $instruction)
                        <li>{{ $instruction }}</li>
                        @endforeach
                    </ol>
                
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