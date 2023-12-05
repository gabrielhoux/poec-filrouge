<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recette</title>
   
    <link rel="stylesheet" href="./app.css">


</head>
<body>

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
        <!-- Affichez le reste des données de la même manière -->
    </div>

    
<!--<h1><center>RECETTE</center></h1>

<div class="liste"><br>
      <div>
         <p> <li></li></p>
          <li></li>
          <p></p><li></li></p>
          <li></li>
          <p></p><li></li></p>
          <li></li>
        </div>
<br>
    <div>
    <p> Cal/100g</p>
    </div>
</div



        <div class="gte">
            <p>  Qte/Pers </p>
        </div>
        
        <br>
        <div class="miame">
            <h2>Mode de preparation :</h2>
            <p> Qu'est-ce que le Lorem Ipsum?
                Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en<br> 
                page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis <br>
                les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour <br>
                réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, <br>
                mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié.<br> 
                Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages <br>
                du Lorem Ipsum, et, plus</p>


        </div>
    -->
      
   
    
<script>
    app.json
</script>
    
</body>
</html>
