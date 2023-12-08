
function handleIngredientClick(ingredient) {
    const li = document.createElement('li');
    li.textContent = ingredient;

    // Ajouter l'ingrédient à la liste
    const ingredientList = document.getElementById('ingredient-list');
    ingredientList.appendChild(li);
}

document.addEventListener('DOMContentLoaded', () => {
    const ingredientInput = document.getElementById('ingredient-input');
    const addIngredientBtn = document.getElementById('add-ingredient');
    const ingredientList = document.getElementById('ingredient-list');
    const ingredientButtons = document.querySelectorAll('.ingredient-button');

    addIngredientBtn.addEventListener('click', () => {
        const newIngredient = ingredientInput.value.trim();
        if (newIngredient !== '') {
            const li = document.createElement('li');
            li.textContent = newIngredient;
            ingredientList.appendChild(li);
            ingredientInput.value = '';
        }
    });




    ingredientButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const ingredient = event.target.textContent;
            handleIngredientClick(ingredient);
        });
    });


    // Supprimer un ingrédient en cliquant dessus dans la liste
    ingredientList.addEventListener('click', (event) => {
        if (event.target.tagName === 'LI') {
            event.target.remove();
        }
    });


   function handleIngredientClick(ingredient) {
    const li = document.createElement('li');
    li.textContent = ingredient;

    // Ajouter l'ingrédient à la liste
    const ingredientList = document.getElementById('ingredient-list');
    ingredientList.appendChild(li);
}


    

    // Gérer la soumission du formulaire
    const form = document.getElementById('ingredient-form');
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Empêche la soumission par défaut
        const ingredients = [...ingredientList.querySelectorAll('li')].map(li => li.textContent);
        console.log(ingredients); // Affiche les ingrédients à soumettre (remplacez par l'envoi AJAX ou la manipulation des données)
        // Soumettre les données via AJAX ou manipuler les données ici
        const selectedRegime = document.getElementById('regimeSelect').value;
        const selectedType = document.getElementById('typeSelect').value;
        const nbrePortions = document.getElementById('portion-input').value;

        console.log('Regime sélectionné :', selectedRegime);
        console.log('Type sélectionné :', selectedType);
        console.log('Nombre de portions sélectionné :', nbrePortions);
    });

    

});



