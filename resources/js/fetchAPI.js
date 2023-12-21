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
const assistantId = "asst_ISGtoQnIZkGJ9tCm2wICRLis";
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

/* async function addMessageToThread(threadId, userQuestion) {
  try {
    const message = await openai.beta.threads.messages.create(
      threadId,
      { role: "user", content: userQuestion }
    );
    console.log(message);
  } catch (error) {
    console.error('Error adding message to thread:', error);
  }
}

async function getAnswer(assistantId, thread) {
  try {
    console.log("Thinking...");
    console.log("Running assistant...");
    const run = await openai.beta.threads.runs.create(
      thread.id,
      { assistant_id: assistantId }
    );

    while (true) 
    {
      const runInfo = await openai.beta.threads.runs.retrieve(
        thread.id,
        run.id
      );
      
      if (runInfo.status === "completed") {
        console.log("Run completed");
        break;
      }

      console.log(runInfo.status);
      console.log("Waiting 30sec...");
      await new Promise((resolve) => setTimeout(resolve, 30000));
    }

    console.log(run);

    console.log("All done...");
    const messages = await openai.beta.threads.messages.list(thread.id);
    const messageContent = messages.data[0].content[0].text.value;
    const extractedJSON = messageContent.match(/{[^}]+}/);
    const jsonString = extractedJSON[0];
    const jsonObject = JSON.parse(jsonString);

    return jsonObject;
  } catch (error) {
    console.error('Error getting answer:', error);
  }
}

export async function sendDataToAPI(data) {
  try {
    const thread = await openai.beta.threads.create();
    console.log("Created thread with id:", thread.id);
  
    // Exemple de liste d'ingrédients pour la recette
    //const ingredients = ["beurre", "épinards", "pâtes", "cumin"];
    const ingredients = data.ingredients;

    // Construction du prompt pour demander une recette basée sur les ingrédients fournis
    const question = `Fais-moi une recette de cuisine avec les ingrédients suivants: ${ingredients.join(", ")}`;

    console.log(question);

    await addMessageToThread(thread.id, question);
    const recipe = await getAnswer(assistantId, thread);
    console.log(`FYI, your thread is: ${thread.id}`);
    console.log(`FYI, your assistant is: ${assistantId}`);

    if (recipe == "" || !recipe) {
      console.log("y a rien");
    }
    console.log(recipe);
  
    sendRecipeToView(recipe)

    console.log("Thanks and happy to serve you");
  } catch (error) {
    console.error('Error in main: ', error);
  }
} */

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
  
  `;

  // Construction du prompt pour demander une recette basée sur les ingrédients fournis
  const question = `Fais-moi une recette de cuisine avec les ingrédients suivants: ${ingredients.join(", ")}`;

  const prompt = instruction + question;

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

  // Fetch image from Google API and append to figure
  const { fetchImage } = await import('./fetchImage.js');
  const imageUrl = await fetchImage(recipe.titre);
  const imgElement = $('<img>', { id: 'imgRecette', src: imageUrl });
  $('#imgContainer').empty().append(imgElement);
  
}

/* async function sendRecipeToView(recipe) {
  try {
    console.log(recipe);
    // Envoyer les données à la route Laravel via une requête POST avec Axios
    await axios.post(`http://127.0.0.1:8000/recette`, recipe);
  } catch (error) {
    console.error("Erreur lors de l'envoi des données:", error);
  }
} */







