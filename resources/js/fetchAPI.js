// Import de la bibliothèque OpenAI
import OpenAI from "openai";

const assistantId = "asst_ISGtoQnIZkGJ9tCm2wICRLis";
const apiKey = await fetchOpenAIKey();
const openai = new OpenAI({ apiKey, dangerouslyAllowBrowser: true });
const threadId = "thread_mokZvb4AoS4zK6ENWZzegUAy";

async function fetchOpenAIKey() {
  try {
    const response = await fetch('/api/openai-key');
    const data = await response.json();

    return data.apiKey;

  } catch (error) {
    console.error(error);
  }
}

async function createThreadAndRun() {

  // Exemple de liste d'ingrédients pour la recette
  const ingredients = ["farine", "œufs", "lait", "sucre"];

  // Construction du prompt pour demander une recette basée sur les ingrédients fournis
  const prompt = `Fais-moi une recette de cuisine avec les ingrédients suivants: ${ingredients.join(", ")}`;

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






