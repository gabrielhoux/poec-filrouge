<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mIAm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/main.js'])
</head>
<body>
    
    <section class="hero is-small">
        <div class="hero-body has-text-centered">
            <h1 class="title">mIAm</h1>
            <h2 class="subtitle">
            Besoin d'une <strong>recette</strong> ?
            </h2>
        </div>
    </section>

    <section class="section is-smal">

        <div id="formulaire">
            @include('formIngredient', ['ingredients' => $ingredients])
        </div>

        <div id="recette">
            @include('recette')
        </div>
        
    </section>

    @include('loadingModal')

    <footer class="footer">
        @include('cookiesFooter')
    </footer>
</body>
<script src="https://kit.fontawesome.com/9c1d9ed11d.js" crossorigin="anonymous"></script>
</html>