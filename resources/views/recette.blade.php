<div class="container is-fluid">
    <div class="columns">
        <div class="column is-two-third">

            <div class="columns is-mobile">
                <span class="column is-one-fifth">
                    <button type="button" class="button is-danger is-rounded" id="returnButton">
                        <span class="icon">
                            <i class="fa-solid fa-arrow-left"></i>
                        </span>
                        <span>Retour</span>
                    </button>
                </span>
                <span class="column is-one-fifth">
                    <button type="button" class="button is-danger is-light is-rounded" id='regenerateButton'>
                        <span class="icon">
                            <i class="fa-solid fa-rotate-right"></i>
                        </span>
                        <span>Recommencer</span>
                    </button>
                </span>
            </div>

            <div class="content is-small">

                <div class="has-text-centered">
                    <h1 id="titre" class="title is-size-2"></h1>
                </div>

                <blockquote id="description" class="has-text-centered"></blockquote>

                <nav class="level">
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="title">Poids</p>
                        <p id="calories" class="heading"></p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="title">Temps</p>
                        <p id="temps" class="heading"></p>
                        </div>
                    </div>
                    <div class="level-item has-text-centered">
                        <div>
                        <p class="title">Portions</p>
                        <p id="portions" class="heading"></p>
                        </div>
                    </div>
                </nav>
                <div class="columns">
                    <div class="column is two-third">
                        <h2 class="subtitle has-text-centered">Instructions</h2> 
                        <ol id="instructions"></ol>
                    </div>
                    <div class="column is-one-third">
                        <h2 class="subtitle has-text-centered">Ingrédients</h2>
                        <ul id="ingredients"></ul>
                    </div>
                </div>
            
            </div>

        </div>

        <div class="column is-one-third">
            <figure id="imgContainer" class="image is-1by2">
                
            </figure>
        </div>
    </div>
</div>