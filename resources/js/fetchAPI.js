// Import de la bibliothèque OpenAI
import OpenAI from "openai";

// Clés API pour chaque utilisateur
const apiKeys = {
  "Gabriel": "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",
  "Nora": "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",
  "Maria": "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",
  "José": "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"
}

// Clé API utilisée ici (dans cet exemple, la clé de "Gabriel" est utilisée)
const apiKey = apiKeys["Gabriel"];

// Initialisation d'OpenAI avec la clé API sélectionnée et autorisation de l'utilisation dans le navigateur
const openai = new OpenAI({ apiKey, dangerouslyAllowBrowser: true });

// Exemple de liste d'ingrédients pour la recette
const ingredients = ["farine", "œufs", "lait", "sucre"];

// Construction du prompt pour demander une recette basée sur les ingrédients fournis
const prompt = `Fais-moi une recette de cuisine avec les ingrédients suivants: ${ingredients.join(", ")}`;

// Fonction asynchrone pour interagir avec l'API OpenAI
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
const formatRecipe = (rawRecipe) => {
  const formatted = rawRecipe.replace(/(\d+\.\s)/g, "\n$&");
  return formatted;
};