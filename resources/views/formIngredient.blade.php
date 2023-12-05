<div class="container">
    <h1>Nouvel ingrédient</h1>
    <form method="post">
        @csrf
        <input id="name" name="name" type="text" placeholder="Ajouter votre ingrédient" required/>
        <button type="submit">Ajouter</button>
    </form>
</div>

<div class="container">
    <select class="form-select" aria-label="Régime">
        <option selected>Régime</option>
        <option value="végé">végé</option>
        <option value="vegan">vegan</option>
        <option value="omni">Omni</option>
        <option value="pesca">pesca</option>
    </select>
</div>
<br>

<div class="container">
    <select class="form-select" aria-label="Catégories">
        <option selected>Catégories</option>
        <option value="Apéritif">Apéritifs</option>
        <option value="entrée">Entrées</option>
        <option value="plat">Plats</option>
        <option value="Dessert">Desserts</option>
        <option value="BOISSON">Boissons</option>
    </select>
</div>
<br>

<div class="container">
    <div><span>Nombre de portions </span></div>
    <button onclick="decrement()">-</button>
    <span id="counter">0</span>
    <button onclick="increment()">+</button>
</div>

<form action="traitement.php" method="post">
    <div class="container">
        <label for="tempsPreparation">Temps de préparation :</label>
        <input type="number" id="tempsPreparation" name="tempsPreparation" placeholder="Entrez le temps de préparation" min="0" step="5" required>
        <span> minutes</span>
    </div>

    <div class="container">
        <input type="checkbox" id="moinsCalorique" name="moinsCalorique">
        <label for="moinsCalorique">Moins calorique</label>
    </div>

    <input type="submit" value="Envoyer">
</form>