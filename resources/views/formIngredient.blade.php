<div class="container is-fluid">
  <form id="ingredient-form" method="post">
  @csrf
    <div class="columns">
      <div class="column">
        <div class="field">
          <label class="label">Ingrédients</label>
          <div class="control">
              <input id="ingredient-input" class="input is-focused" pattern="[A-Za-z\s]+" type="text" placeholder="Pâtes, oeuf, ..." autofocus>
              <button id="add-ingredient" class="button is-primary" type="button">Ajouter</button>
          </div>
        </div>

        <div class="field">
          <ul id="ingredient-list"></ul>
        </div>

      </div>
      <div class="column">

        <div class="field">
          <label class="label">Régime</label>
          <div class="control">
            <div class="select is-rounded">
              <select aria-label="select-regime" id="regimeSelect">
                  <option value="">Sélectionner</option>
                  <option value="végé">Végétarien</option>
                  <option value="vegan">Vegan</option>
                  <option value="omni">Omnivore</option>
              </select>
            </div>
          </div>
      </div>

      <div class="field">
          <label class="label">Type de plat</label>
          <div class="control">
            <div class="select is-rounded">
              <select aria-label="select-type" id="typeSelect">
                  <option value="">Sélectionner</option>
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
                <input id="portion-input" class="input is-rounded" type="number" min="0">
              </div>
          </div>
      </div>

      <div class="field">
        <label class="label" for="tempsPreparation">Temps de préparation</label>
        <input class="input is-rounded" type="number" id="temps-preparation" name="temps-preparation" min="0" step="5">
        <span> minutes</span>
      </div>

      <div class="field">
        <div class="control">
          <label class="checkbox">
            <input type="checkbox">
            <strong>Léger</strong>
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
      </div>
    </div>
  </form>
</div>