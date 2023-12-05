// Import du fichier .env
import dotenv from 'dotenv';
dotenv.config()

// Import de la bibliothèque OpenAI
import OpenAI from "openai";

// Récupération de la clé API, stockée dans la variable API_KEY du fichier .env
const apiKey = process.env.OPENAI_API_KEY;

// Récupération de l'ID de l'API Assistant ChatGPT dans la variable ASSISTANT_ID du fichier .env
const assistantId = process.env.OPENAI_ASSISTANT_ID;

// Initialisation d'OpenAI avec la clé API et autorisation de l'utilisation dans le navigateur
const openai = new OpenAI({ apiKey, dangerouslyAllowBrowser: true });

// Exemple de liste d'ingrédients pour la recette
const ingredients = ["farine", "œufs", "lait", "sucre"];

// Construction du prompt pour demander une recette basée sur les ingrédients fournis
const prompt = `Fais-moi une recette de cuisine avec les ingrédients suivants: ${ingredients.join(", ")}`;


// Fonction asynchrone pour interagir avec l'API OpenAI de base
async function fetchOpenAI(prompt) {
  try {
    // Création d'une requête à l'aide du modèle chat de OpenAI
    const response = await openai.chat.completions.create({
      messages: [
        {
          role: "system",
          content: prompt,
        },
      ],
      model: "gpt-3.5-turbo", // Utilisation du modèle GPT-3.5 Turbo
    });

    // Récupération du texte de la recette obtenue
    const text = response.choices[0].message.content;

    // Formatage du texte de la recette obtenue pour une meilleure lisibilité
    const formattedRecipe = formatRecipe(text);

    return formattedRecipe; // Retourne la recette formatée
  } catch (error) {
    console.error(error);
    return null;
  }
}
// Fonction pour formater la recette en ajoutant des retours à la ligne devant les numéros des étapes
function formatRecipe(rawRecipe) {
  const formatted = rawRecipe.replace(/(\d+\.\s)/g, "\n$&");
  return formatted;
};

//

async function createThreadAndRun(assistantId, prompt) {
  const run = await openai.beta.threads.createAndRun({
    assistant_id: assistantId,
    thread: {
      messages: [
        { role: "user", content: prompt },
      ],
    },
  });

  console.log(run["thread_id"]);
}

const threadId = "thread_mokZvb4AoS4zK6ENWZzegUAy";

async function listMessage(threadId) {
  const threadMessages = await openai.beta.threads.messages.list(
    threadId
  );

  const messageIndex = threadMessages.data.length - 1;

  const messageText = threadMessages.data[messageIndex].content[0].text.value;

  console.log(messageText);

}

//createThreadAndRun(assistantId, prompt);
listMessage(threadId);






