<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recette</title>
</head>
<body>

    
<!-- use Illuminate\Support\Facades\View;
 
return View::make('recette', ['name' => 'James']); -->


<div>
    <h1>RECETTE</h1>
    <form>
        <label for="name">:</label>

<input type="text" id="name" name="name" required minlength="24" maxlength="18" size="20" /> <br>
      <!-- Créer un item à faire -->
      <label for="title"> ingredient</label>
      <input type="text" name="title" id="title" />
      <button type="submit">Enregistrer</button>
    </form>
</div>
    
</body>
</html>
