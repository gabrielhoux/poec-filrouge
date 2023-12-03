

<div class="container">

    <h1>Nouvel ingrédient</h1>
    <for method="post">
     @csrf
        <label for="name">Nom</label>
        <input id ="name" name ="name" type="text" required/>
        <button type="submit">Enregister</button>
    </for>
</div>

