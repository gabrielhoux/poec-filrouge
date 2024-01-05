import { openModal, closeModal } from './loadingModal.js';
import $ from 'jquery';

// Récupération de la variable locale de l'utilisateur indiquant l'acceptation des cookie
var cookiesAccepted = localStorage.getItem('cookiesAccepted');

// Initialisation de la variable des données du formulaire
var data;

document.addEventListener('DOMContentLoaded', () =>
{
    // Initialisation des éléments et boutons du formulaire
    const ingredientInput = document.getElementById('ingredient-input');
    const addIngredientBtn = document.getElementById('add-ingredient');
    const ingredientList = document.getElementById('ingredient-list');
    const ingredientButtons = document.querySelectorAll('#ingredient-button');

    addIngredientBtn.addEventListener('click', () =>
    {
        // Réinitialisation du message et indicateurs d'input invalide
        $('#input-message').text("");
        $('#ingredient-input').removeClass("is-danger");
        $('#input-icon-container').empty();

        // Récupération de l'input d'ingrédient de l'utilisateur
        const newIngredient = ingredientInput.value.trim();

        // Vérification que l'input est valide et exclusivement alphabétique via regex
        if (/^[A-Za-z\s]+$/.test(newIngredient))
        {
            // Formattage minuscule de l'ingrédient
            const formattedIngredient = newIngredient.toLowerCase();

            // Enregistrement de l'évènement via Matomo
            if (cookiesAccepted === "true")
            {
                _paq.push(['trackEvent', 'Button click', 'Ajout ingrédient manuel', formattedIngredient]);
            }

            // Ajout de l'ingrédient
            handleIngredientClick(formattedIngredient);

            // Réinitialisation du champs
            ingredientInput.value = '';
        }
        else
        {
            // Affichage d'un message et d'indicateurs d'input invalide
            $('#input-message').text("Entrée invalide");
            $('#ingredient-input').addClass("is-danger");
            $('#input-icon-container').append("<i class='fas fa-exclamation-triangle'></i>");

            // Réinitialisation du champs
            ingredientInput.value = '';
        }
    });

    // Ajout d'ingrédient via bouton "Ajouter" avec handleIngredientClick
    ingredientButtons.forEach(button =>
    {
        button.addEventListener('click', (event) =>
        {
            // Récupération du nom de l'ingrédient
            const ingredient = event.target.textContent;

            // Enregistrement de l'évènement via Matomo
            if (cookiesAccepted === "true")
            {
                _paq.push(['trackEvent', 'Button click', 'Ajout ingrédient', ingredient]);
            }

            // Ajout de l'ingrédient
            handleIngredientClick(ingredient);
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

        // Récupération des données du formulaire
        const ingredients = [...ingredientList.querySelectorAll('#ingredient-element')].map(el => el.textContent);
        const selectedRegime = document.getElementById('regimeSelect').value;
        const selectedType = document.getElementById('typeSelect').value;
        const portionnbre = document.getElementById('portion-input').value;
        const tempsPreparation = document.getElementById('temps-preparation').value;
        const legerCheckbox = document.getElementById('legerCheckbox');

        data = { "ingredients": ingredients }; // Inclure toujours les ingrédients
        // Vérification des valeurs optionnelles
        if (selectedRegime !== "") data.selectedRegime = selectedRegime;
        if (selectedType !== "") data.selectedType = selectedType;
        if (portionnbre !== "0") data.portionnbre = portionnbre;
        if (tempsPreparation !== "0") data.tempsPreparation = tempsPreparation;
        if (legerCheckbox.checked) data.legerCheckbox = true;

        console.log(data);

        // Enregistrement de l'évènement via Matomo
        if (cookiesAccepted === "true")
        {
            _paq.push(['trackEvent', 'Form', 'Submission', data.toString()]);
        }

        try {
            // Envoi des données à OpenAI et affichage du modal "Merci de patienter"
            const { sendDataToAPI } = await import('./fetchAPI.js');
            openModal();
            await sendDataToAPI(data);
            closeModal();

            // Réinitialisation du formulaire
            form.reset();

            // Réinitialisation de la liste d'ingrédients
            ingredientList.innerHTML = "";
        } catch (error) {
            console.error('Error sending data to main:', error);
        }
      
    });

    // Réinitialisation du formulaire sur clic du bouton "Réinitialiser"
    const cancelButton = document.getElementById('cancelButton');
    cancelButton.addEventListener('click', () =>
    {
        // Réinitialiser le formulaire
        form.reset();

        // Enregistrement de l'évènement via Matomo
        if (cookiesAccepted === "true")
        {
            _paq.push(['trackEvent', 'Button click', 'Réinitialisation du formulaire']);
        }
    
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

    // Nouvelle génération de recette avec les mêmes ingrédients/critères sur clic du bouton
    const regenerateButton = document.getElementById('regenerateButton');
    regenerateButton.addEventListener('click', async (event) => {

        event.preventDefault(); // Empêche la soumission par défaut

        // Enregistrement de l'évènement via Matomo
        if (cookiesAccepted === "true")
        {
            _paq.push(['trackEvent', 'Form', 'Resubmission', data.toString()]);
        }

        try {
            // Envoi des données à OpenAI et affichage du modal "Merci de patienter"
            const { sendDataToAPI } = await import('./fetchAPI.js');
            openModal();
            await sendDataToAPI(data);
            closeModal();
        } catch (error) {
            console.error('Error sending data to main:', error);
        }
    });

});

// Ajout d'ingrédient à la liste, sous forme d'un bouton avec une icône X pour l'effacer si on clique dessus
function handleIngredientClick(ingredient)
{
    // Initialisation de l'élément li sous forme d'un bouton
    const $li = $(`
        <li id="button-element"  class="button is-outlined  mb-2 mr-2 ">
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










