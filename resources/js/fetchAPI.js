// Import de la bibliothèque OpenAI
import OpenAI from "openai";
import axios from "axios";

// Initialisation des variables pour utiliser l'API OpenAI
const assistantId = "asst_ISGtoQnIZkGJ9tCm2wICRLis";
const apiKey = await fetchOpenAIKey();
const openai = new OpenAI({ apiKey, dangerouslyAllowBrowser: true });
const threadId = "thread_SJ4wEygT9nSeORG20JColjiN";

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
    return message;
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

/*     while (true) {
      const runInfo = await openai.beta.threads.runs.retrieve(
        thread.id,
        run.id
      );
      
      if (runInfo.status === "completed") {
        console.log("Run completed");
        break;
      }
      console.log("Waiting 10sec...");
      await new Promise((resolve) => setTimeout(resolve, 10000));
    } */

    console.log("Waiting 60sec...");
    await new Promise((resolve) => setTimeout(resolve, 60000));

    console.log(run);

    console.log("All done...");
    const messages = await openai.beta.threads.messages.list(thread.id);
    const messageContent = messages.data[0].content[0].text.value;
    return messageContent;
  } catch (error) {
    console.error('Error getting answer:', error);
  }
}

async function main() {
  try {
    const thread = await openai.beta.threads.create();
    console.log("Created thread with id:", thread.id);
  
    // Exemple de liste d'ingrédients pour la recette
    const ingredients = ["beurre", "épinards", "pâtes", "cumin"];

    // Construction du prompt pour demander une recette basée sur les ingrédients fournis
    const question = `Fais-moi une recette de cuisine avec les ingrédients suivants: ${ingredients.join(", ")}`;

    await addMessageToThread(thread.id, question);
    const messageContent = await getAnswer(assistantId, thread);
    console.log(`FYI, your thread is: ${thread.id}`);
    console.log(`FYI, your assistant is: ${assistantId}`);
    console.log(messageContent);
  
    console.log("Thanks and happy to serve you");
  } catch (error) {
    console.error('Error in main:', error);
  }
}

main();







