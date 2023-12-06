<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>M•IA•M</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    @vite(['resources/css/app.css', 'resources/js/main.js'])
</head>
<body>
    <section class="section is-medium">
        <h1 class="title">M•IA•M</h1>
        <h2 class="subtitle">
          Besoin d'une <strong>recette</strong> ?
        </h2>

        @include('formIngredient')
    </section>
    <footer class="footer">
        @include('cookiesFooter')
    </footer>
</body>
</html>