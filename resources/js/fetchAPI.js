// Import de la bibliothèque OpenAI
import OpenAI from "openai";
import axios from "axios";

// Initialisation des variables pour utiliser l'API OpenAI
const assistantId = "asst_ISGtoQnIZkGJ9tCm2wICRLis";
const apiKey = await fetchOpenAIKey();
const openai = new OpenAI({ apiKey, dangerouslyAllowBrowser: true });

async function fetchOpenAIKey() {
  try {
    const response = await axios(`http://localhost:8000/api/openai-key`);
    const apiKey = response.data.apiKey;

    return apiKey;

  } catch (error) {
    console.error(error);
  }
}

async function addMessageToThread(threadId, userQuestion) {
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
}

async function sendRecipeToView(recipe) {
  try {
    const formData = new FormData();
    formData.append('recipe', recipe); // Ajouter la recette au FormData

    // Envoyer les données à la route Laravel via une requête POST avec Axios
    const response = await axios.post(`http://localhost:8000/recette`, formData);

    if (response.ok) {
      // Gérer la réponse si nécessaire
      const responseData = await response.json();
      console.log('Réponse de la route Laravel :', responseData);
    } else {
      console.error("Erreur lors de l'envoi des données à la route Laravel");
    }
  } catch (error) {
    console.error("Erreur lors de l'envoi des données:", error);
  }
}









