<div class="container is-fluid">
    <form method="post">
    @csrf
        <div class="field">
            <label class="label">Ingrédient</label>
            <div class="control">
              <input id="ingredient-input" class="input is-focused" type="text" placeholder="Pâtes, oeuf, ...">
            </div>
        </div>

        <div class="field">
            <label class="label">Régime</label>
            <div class="control">
              <div class="select">
                <select>
                    <option value="">Sélectionner</option>
                    <option value="végé">végé</option>
                    <option value="vegan">vegan</option>
                    <option value="omni">Omni</option>
                    <option value="pesca">pesca</option>
                </select>
              </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Type de plat</label>
            <div class="control">
              <div class="select">
                <select>
                    <option selected>Sélectionner</option>
                    <option value="aperitif">Apéritif</option>
                    <option value="entree">Entrée</option>
                    <option value="plat">Plat</option>
                    <option value="dessert">Dessert</option>
                    <option value="boisson">Boisson</option>
                </select>
              </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Nombre de portions</label>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary" onclick="decrement()">-</button>
                </div>
                <div class="control">
                    <button class="button is-white">1</button>
                </div>
                <div class="control">
                    <button class="button is-primary" onclick="increment()">+</button>
                </div>
            </div>
        </div>

        <div class="field">
            <label for="tempsPreparation">Temps de préparation :</label>
            <input type="number" id="tempsPreparation" name="tempsPreparation" placeholder="Entrez le temps de préparation" min="0" step="5" required>
            <span> minutes</span>
        </div>

        <div class="field">
            <div class="control">
              <label class="checkbox">
                <input type="checkbox">
                Léger
              </label>
            </div>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link">Valider</button>
            </div>
            <div class="control">
              <button class="button is-link is-light">Annuler</button>
            </div>
          </div>
    </form>