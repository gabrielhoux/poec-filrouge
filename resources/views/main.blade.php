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
        <div class="content has-text-centered">
            <p>
                Cuisiné avec goût par Gabriel Houx, Nora Messaouidi, Maria de Carvalho & José
            </p>
            <p>
                Tous droits réservés • <strong>mIAm</strong> 2023-2024
            </p>
        </div>
        <div class="columns is-mobile mt-4">
            <div class="column is-one-quarter"></div>
            <div class="column is-two-quarter">
                <div class="columns is-mobile">
                    <div class="column logo-container is-vcentered">
                        <figure class="image is-48x48">
                            <a href="https://openai.com/">
                                <img src="https://freelogopng.com/images/all_img/1681142382OpenAI-png.png" alt="openai-logo">
                            </a>
                        </figure>
                    </div>
                    <div class="column logo-container is-vcentered">
                        <figure class="image is-48x48">
                            <a href="https://www.ib-formation.fr/">
                                <img src="https://www.ib-formation.fr/vendor/laravel-theme-inter/dirAssetse694b50/media/img/logo-ib.png" alt="ib-cegos-logo">
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="column is-one-quarter"></div>
        </div>
        @include('cookiesFooter')
    </footer>
</body>
<script src="https://kit.fontawesome.com/9c1d9ed11d.js" crossorigin="anonymous"></script>
</html>