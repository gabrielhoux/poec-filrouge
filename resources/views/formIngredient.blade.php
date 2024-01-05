<div class="container is-fluid">
  <form id="ingredient-form" method="post">
  @csrf
    <div class="columns">

      <div class="column is-three-fifth">
        <div class="field">
          <label for="ingredient-input" class="label">Ingrédients</label>
          <div class="field has-addons">
            <div id="ingredient-control" class="control has-icons-right">
              <input id="ingredient-input" class="input is-rounded" pattern="[A-Za-z\s]+" type="text" placeholder="Pâtes, oeuf, ..." autofocus>
              <span id="input-icon-container" class="icon is-small is-right"></span>
            </div>
            <div class="control">
              <button id="add-ingredient" class="button is-primary is-rounded  is-danger" type="button">
                Ajouter
              </button>
            </div>
          </div>
          <p id="input-message" class="help is-danger"></p>
        </div>

        <div class="buttons are-small" id="ingredient-buttons">
          @foreach ($ingredients as $ingredient)
              <button id="ingredient-button" type="button" class="button is-rounded" class="button is-danger" >
                {{ $ingredient }}
              </button>
          @endforeach
        </div>

        <div class="field" id="ingredient-field">
          <label for="ingredient-input" class="label" >Ingrédients sélectionnés</label>
          <ul id="ingredient-list" class="mb-4"></ul>
        </div>

      </div>

      <div class="column is-two-fifth">

        <div class="field">
          <label for="regimeSelect" class="label">Régime</label>
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
          <label for="typeSelect" class="label">Type de plat</label>
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
          <label for="portion-input" class="label">Nombre de portions</label>
          <div class="field is-grouped">
              <div class="control">
                <input id="portion-input" class="input is-rounded "  type="number" min="0">
              </div>
          </div>
        </div>

        <div class="field">
          <label class="label" for="temps-preparation">Temps de préparation</label>
          <input class="input is-rounded" type="number" id="temps-preparation" name="temps-preparation" min="0" step="5">
          <span> minutes</span>
        </div>

        <div class="field">
          <div class="control">
            <label class="checkbox">
              <input type="checkbox" id="legerCheckbox">
              <strong>Léger</strong>
            </label>
          </div>
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button type="submit" class="button is-danger is-rounded">
              <span class="icon">
                <i class="fa-solid fa-magnifying-glass"></i>
              </span>
              <span>Valider</span>
            </button>
          </div>
          <div class="control">
            <button type="button" class="button is-danger is-light is-rounded" id='cancelButton'>
              <span class="icon">
                <i class="fa-solid fa-rotate-left"></i>
              </span>
              <span>Réinitialiser</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>