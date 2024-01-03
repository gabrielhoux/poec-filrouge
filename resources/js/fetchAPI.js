// Import de la bibliothèque OpenAI
import OpenAI from "openai";
import axios from "axios";
import $ from 'jquery';

// Récupération du token CSRF
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

// Activation de l'authentification pour Axios
axios.defaults.withCredentials = true;

// Initialisation des variables pour utiliser l'API OpenAI
const assistantId = "asst_VrRUrECJUPrt9oXsMpG5umi9";
const apiKey = await fetchOpenAIKey();
const openai = new OpenAI({ apiKey, dangerouslyAllowBrowser: true });

async function fetchOpenAIKey() {
  try {
    const response = await axios(`http://127.0.0.1:8000/api/openai-key`);
    const apiKey = response.data.apiKey;
    return apiKey;

  } catch (error) {
    console.error(error);
  }
}

export async function sendDataToAPI(data) {

  const ingredients = data.ingredients;

  const instruction = `
  Tu es un puits intarissable de savoir en termes de recettes de cuisine.
  Afin que je puisse diffuser tes recettes sur internet pour que le monde entier en profite, il faut que la recette de cuisine que tu me donnes soit disposée tel un fichier JSON,
  strictement d'après la structure suivante:
  
  {
  "titre": "le titre de la recette",
  "description": "une description qui vante la recette",
  "ingredients": [une liste de string contenant chaque nom d'ingrédient et leur quantitée utilisée dans la recette, par exemple: "250g de farine", "50g de sucre", etc],
  "type": "le type de plat (quiche, soupe, entrée, salade, etc)",
  "regime": "le régime associé à la recette (végétarien, vegan, ou omnivore si aucun spécifié)",
  "temps": "le temps de préparation et de cuisson",
  "poids": "le poids calorique par portion de la recette",
  "instructions": [la liste des instructions],
  "portions": "le nombre de portions"
  }
  
  N'ajoute rien en dehors des accolades, afin que ta réponse puisse être directement convertie en JSON.

  Si l'un des ingrédients renseignés n'est en réalité pas un produit alimentaire (par exemple: de la mort aux rats, de l'eau de javel ou encore un chat), n'en prends pas compte et fais la recette en omettant tout élément illicite.
  
  `;

  // Construction du prompt pour demander une recette basée sur les ingrédients fournis
  let criteres = "";
  criteres += (data.selectedType ? `, type de plat: ${data.selectedType}` : "");
  criteres += (data.selectedRegime ? `, régime: ${data.selectedRegime}` : "");
  criteres += (data.portionnbre ? `, portions: ${data.portionnbre}` : "");
  criteres += (data.tempsPreparation ? `, temps: ${data.tempsPreparation}` : "");
  criteres += (data.legerCheckbox ? ", léger: oui" : "");

  const question = `Fais-moi une recette de cuisine avec les ingrédients suivants: ${ingredients.join(", ")}${criteres}`; 

  const prompt = instruction + question;
  console.log(prompt);

  try {
    const completion = await openai.chat.completions.create({
      messages: [
        {
          role: "system",
          content: prompt
        },
      ],
      model: "gpt-3.5-turbo",
    });

    const result = completion.choices[0].message.content;
    console.log(result);

    const recipe = JSON.parse(result);

    console.log(recipe);

    await displayRecipe(recipe);

  } catch (error) {
    console.error("Erreur OpenAI:", error);
    return error;
  }
}

async function displayRecipe(recipe) {
  // Hide the form
  $('#formulaire').hide();

  // Show the recipe div
  $('#recette').show();

  // Populate the recipe div with the data from the recipe
  $('#titre').text(recipe.titre);
  $('#description').text(recipe.description);
  $('#calories').text(recipe.poids);
  $('#temps').text(recipe.temps);
  $('#portions').text(recipe.portions);

  // Clear and populate the instructions list
  $('#instructions').empty();
  recipe.instructions.forEach(instruction => {
    $('#instructions').append(`<li>${instruction}</li>`);
  });

  // Clear and populate the ingredients list
  $('#ingredients').empty();
  recipe.ingredients.forEach(ingredient => {
    $('#ingredients').append(`<li>${ingredient}</li>`);
  });

  // Get recipe image
  const imgUrl = await getRecipeImage(recipe.titre);

  // Append the image to the figure
  const imgElement = $('<img>', { id: 'imgRecette', src: imgUrl });
  $('#imgContainer').empty().append(imgElement);
  
}

async function getRecipeImage(titre)
{
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/fetch-image/${titre}`);
    const imgUrl = await response.text();
    return imgUrl;
  } catch (error) {
    console.error(error);
    return error;
  }
}







