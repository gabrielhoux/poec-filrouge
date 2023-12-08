import { sendDataToAPI } from './fetchAPI.js';

document.addEventListener('DOMContentLoaded', () => {
    const ingredientInput = document.getElementById('ingredient-input');
    const addIngredientBtn = document.getElementById('add-ingredient');
    const ingredientList = document.getElementById('ingredient-list');
    const ingredientButtons = document.querySelectorAll('.ingredient-button');

    addIngredientBtn.addEventListener('click', () => {
        const newIngredient = ingredientInput.value.trim();
        if (newIngredient !== '') {
            const li = document.createElement('li');
            li.classList.add('ingredient-element');
            li.textContent = newIngredient.toLowerCase();
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

    // Gérer la soumission du formulaire
    const form = document.getElementById('ingredient-form');
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Empêche la soumission par défaut
        const ingredients = [...ingredientList.querySelectorAll('ingredient-element')].map(li => li.textContent);
        console.log(ingredients); // Affiche les ingrédients à soumettre (remplacez par l'envoi AJAX ou la manipulation des données)
        // Soumettre les données via AJAX ou manipuler les données ici
        const selectedRegime = document.getElementById('regimeSelect').value;
        const selectedType = document.getElementById('typeSelect').value;
        const portionnbre = document.getElementById('portion-input').value;
        const tempsPreparation = document.getElementById('temps-preparation').value;
        const legerCheckbox = document.getElementById('legerCheckbox');

        console.log('Regime sélectionné :', selectedRegime);
        console.log('type sélectionné :', selectedType);
        console.log('nombre de portion :', portionnbre);
        console.log('temps de Preparation est :', tempsPreparation ,'minute');
        console.log('legerCheckbox :', legerCheckbox.checked);

        // Vérification des valeurs optionnelles
        const data = { ingredients }; // Inclure toujours les ingrédients
        if (selectedRegime !== "") data.selectedRegime = selectedRegime;
        if (selectedType !== "") data.selectedType = selectedType;
        if (portionnbre !== "0") data.portionnbre = portionnbre;
        if (tempsPreparation !== "0") data.tempsPreparation = tempsPreparation;
        if (legerCheckbox.checked) data.legerCheckbox = true;

        sendDataToAPI(data);
      
    });

    const cancelButton = document.getElementById('cancelButton');
    cancelButton.addEventListener('click', () => {
        // Réinitialiser le formulaire
        form.reset();
    
         // Réinitialiser la liste des ingrédients
        ingredientList.innerHTML  = '';
    
        document.getElementById('typeSelect').value = '';

        // Réinitialiser le nombre de portions
        document.getElementById('portion-input').value = '';

        // Réinitialiser le temps de préparation
        document.getElementById('temps-preparation').value = '';

        // Désélectionner la case à cocher "Léger"
        document.getElementById('legerCheckbox').checked = false;
    });
});

function handleIngredientClick(ingredient) {
    const li = document.createElement('li');
    li.textContent = ingredient;

    // Ajouter l'ingrédient à la liste
    const ingredientList = document.getElementById('ingredient-list');
    ingredientList.appendChild(li);
}










