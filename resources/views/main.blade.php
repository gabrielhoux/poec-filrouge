<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mIAm</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalnia:wght@500&family=Roboto:wght@100&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/main.js'])
    
</head>
<body>

    <section class="hero is-small">
    
        <div class="container is-fluid has-text-centered mt-4 mb-4">
            <img src="images/logo_kalnia.png" alt="Logo" class="image-logo">
        </div>
        
    </section>

    <div class="container is-fluid mt-4">
        <h2 class="subtitle is-size-3 ml-6" id="miam-subtitle">
            Besoin d'une <strong>recette</strong> ?
        </h2>
    </div>

    <section class="section is-small">

        <div id="formulaire">
            @include('formIngredient', ['ingredients' => $ingredients])
        </div>

        <div id="recette">
            @include('recette')
        </div>
        
    </section>

    @include('loadingModal')

    @include('footer')
</body>
<script src="https://kit.fontawesome.com/9c1d9ed11d.js" crossorigin="anonymous"></script>
</html>