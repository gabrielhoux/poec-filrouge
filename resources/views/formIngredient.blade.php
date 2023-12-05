        <div class="container">
            <h1>Nouvel ingrédient</h1>
            <form method="post">
            @csrf
                <label for="name">Nom</label>
                <input id ="name" name ="name" type="text" required/>
                <button type="submit">Enregister</button>
            </form>
        </div>

        <div class="container">
            <select class="form-select" aria-label="select-regime">
                <option selected>Régime</option>
                <option value="végé">Végétarien</option>
                <option value="vegan">Vegan</option>
                <option value="omni">Omnivore</option>
                <option value="pesca">Pescatarien</option>
            </select>
        </div>

        <div class="container">
            <select class="form-select" aria-label="select-categorie">
                <option selected>Catégorie</option>
                <option value="apéritif">Apéritif</option>
                <option value="entrée">Entrée</option>
                <option value="plat">Plat</option>
                <option value="dessert">Dessert</option>
                <option value="boisson">Boisson</option>
            </select>
        </div>

