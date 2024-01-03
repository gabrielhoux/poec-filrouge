import { openModal, closeModal } from './loadingModal.js';
import $ from 'jquery';

document.addEventListener('DOMContentLoaded', () =>
{
    const ingredientInput = document.getElementById('ingredient-input');
    const addIngredientBtn = document.getElementById('add-ingredient');
    const ingredientList = document.getElementById('ingredient-list');
    const ingredientButtons = document.querySelectorAll('#ingredient-button');

    addIngredientBtn.addEventListener('click', () =>
    {
        $('#input-message').text("");
        $('#ingredient-input').removeClass("is-danger");
        $('#input-icon-container').empty();

        const newIngredient = ingredientInput.value.trim();
        if (/^[A-Za-z\s]+$/.test(newIngredient))
        {
            // Formattage minuscule de l'ingrédient
            const formattedIngredient = newIngredient.toLowerCase();
            // Ajout de l'ingrédient
            handleIngredientClick(formattedIngredient);
            // Ajout de l'évenement à Matomo
            _paq.push(['trackEvent', 'Button click', 'Ajout ingrédient manuel', formattedIngredient]);
            // Réinitialisation du champs
            ingredientInput.value = '';
        }
        else
        {
            $('#input-message').text("Entrée invalide");
            $('#ingredient-input').addClass("is-danger");
            $('#input-icon-container').append("<i class='fas fa-exclamation-triangle'></i>");
            ingredientInput.value = '';
        }
    });

    // Ajout d'ingrédient via bouton "Ajouter" avec handleIngredientClick
    ingredientButtons.forEach(button =>
    {
        button.addEventListener('click', (event) =>
        {
            const ingredient = event.target.textContent;
            // Ajout de l'ingrédient
            handleIngredientClick(ingredient);
            // Ajout de l'évenement à Matomo
            _paq.push(['trackEvent', 'Button click', 'Ajout ingrédient', ingredient]);
        });
    });

    // Supprimer un ingrédient en cliquant dessus dans la liste
    ingredientList.addEventListener('click', (event) =>
    {
        if (event.target.tagName === 'i')
        {
            const li = event.target.parentElement;
            li.remove();
        }
    });   

    // Gérer la soumission du formulaire
    const form = document.getElementById('ingredient-form');
    form.addEventListener('submit', async (event) =>
    {
        event.preventDefault(); // Empêche la soumission par défaut
        const ingredients = [...ingredientList.querySelectorAll('#ingredient-element')].map(el => el.textContent);
        console.log(ingredients); // Affiche les ingrédients à soumettre (remplacez par l'envoi AJAX ou la manipulation des données)
        // Soumettre les données via AJAX ou manipuler les données ici
        const selectedRegime = document.getElementById('regimeSelect').value;
        const selectedType = document.getElementById('typeSelect').value;
        const portionnbre = document.getElementById('portion-input').value;
        const tempsPreparation = document.getElementById('temps-preparation').value;
        const legerCheckbox = document.getElementById('legerCheckbox');

        const data = { "ingredients": ingredients }; // Inclure toujours les ingrédients
        // Vérification des valeurs optionnelles
        if (selectedRegime !== "") data.selectedRegime = selectedRegime;
        if (selectedType !== "") data.selectedType = selectedType;
        if (portionnbre !== "0") data.portionnbre = portionnbre;
        if (tempsPreparation !== "0") data.tempsPreparation = tempsPreparation;
        if (legerCheckbox.checked) data.legerCheckbox = true;

        console.log(data);

        // Push custom event to track form submission with data submitted
        _paq.push(['trackEvent', 'Form', 'Submission', `${data}`]);

        try {
            // Envoi des données à la fonction main
            const { sendDataToAPI } = await import('./fetchAPI.js');
            openModal();
            await sendDataToAPI(data);
            closeModal();
            form.reset();
            ingredientList.innerHTML = "";
        } catch (error) {
            console.error('Error sending data to main:', error);
        }
      
    });

    const cancelButton = document.getElementById('cancelButton');
    cancelButton.addEventListener('click', () =>
    {
        // Réinitialiser le formulaire
        form.reset();

        // Ajout de l'évenement à Matomo
        _paq.push(['trackEvent', 'Button click', 'Réinitialisation du formulaire']);
    
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

// Ajout d'ingrédient à la liste, sous forme d'un bouton avec une icône X pour l'effacer si on clique dessus
function handleIngredientClick(ingredient)
{
    // Initialisation de l'élément li sous forme d'un bouton
    const $li = $(`
        <li class="button is-outlined is-primary">
            <span id="ingredient-element">${ingredient}</span>
            <span class="icon is-small">
                <i class="fas fa-times remove-ingredient"></i>
            </span>
        </li>
    `);

    // Ajout de l'élément li à la liste d'ingrédient
    $('#ingredient-list').append($li);

    // Suppression de l'élément de la liste si icône X cliquée
    $li.find('.remove-ingredient').on('click', () => {
        $li.remove();
    });
}










