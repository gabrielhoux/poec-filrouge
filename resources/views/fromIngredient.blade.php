<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ingredient</title>

<body>
<div class="container">

<h1>Nouvel ingrédient</h1>
<for method="post">
 @csrf
    <label for="name">Nom</label>
    <input id ="name" name ="name" type="text" required/>
    <button type="submit">Enregister</button>
</for>

</div>

<div class="container">
<select class="form-select" aria-label="Default select example">
<option selected>Régime</option>
<option value="végé">végé</option>
<option value="vegan">vegan</option>
<option value="omni">Omni</option>
<option value="pesca">pesca</option>
</select>
</div>

<div class="container">
<select class="form-select" aria-label="Default select example">
<option selected>Categories </option>
<option value="Apéritif">Apéritifs</option>
<option value="entrée">entrée</option>
<option value="plat">plat</option>
<option value="Dessert">Dessert</option>
<option value="BOISSON">BOISSON </option>




</select>
</div>
    
</body>
</html>

