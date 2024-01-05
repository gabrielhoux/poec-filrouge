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

    <section class="section is-small">

        <div id="formulaire">
            @include('formIngredient', ['ingredients' => $ingredients])
        </div>

        <div id="recette">
            @include('recette')
        </div>

    </section>

    @include('loadingModal')

  <!--  <footer class="footer">
    
      <a href="/"> Cuisine avec gout par Gabriel HOUX, Nora MESSAOUDT, Maria de CARVALHO  & José Antonio DJATA</a>
      
      <div class="columns">
        <div class="column">
            <figure class="image is-48x48">
                <img src="https://bulma.io/images/placeholders/128x128.png">
            </figure>
        </div>
        <div class="column">
            <figure class="image is-48x48">
                <img src="https://cdn.icon-icons.com/icons2/509/PNG/512/Github_icon-icons.com_49946.png">
            </figure>
        </div>
        <div class="column">
            <figure class="image is-48x48">
                <img src="https://cdn.icon-icons.com/icons2/509/PNG/512/Github_icon-icons.com_49946.png">
            </figure>
        </div>

      </div>
 
       Copyright © 2023 Football History Archives. All Rights Reserved.
      </div>
    </footer>

      <footer>
            @include('cookiesFooter')
            
        </footer> 
        --> 
      
        <footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>Cuisiné avec goût  </strong> par <a href="https://jgthms.com">Gabriel Houx, Nora Messaoudi, Maria De Carvalho & José Antonio Djata</a><br><a href="http://opensource.org/licenses/mit-license.php"></a>Tous droits réservés <strong>.mIAm </strong>2023-2024
      <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
        </a>.
    </p><br><br>

    <div class="columns">
        <div class="column">
            <figure class="image is-48x48">
                <img src="https://tse2.mm.bing.net/th?id=OIP.2n4KXsgLpwVngr2d8Q46vwHaHa&pid=Api&P=0&h=180">
            </figure>
        </div>

        <div class="column">
            <figure class="image is-48x48">
                <img src="https://www.ib-formation.fr/vendor/laravel-theme-inter/dirAssetse694b50/media/img/logo-ib.png">
            </figure>
        </div>
        

        <div class="column">
            <figure class="image is-48x48">
                <img src="https://cdn.icon-icons.com/icons2/509/PNG/512/Github_icon-icons.com_49946.png">
            </figure>
        </div>
  </div>
</footer>
</body>

<script src="https://kit.fontawesome.com/9c1d9ed11d.js" crossorigin="anonymous"></script>

</html>