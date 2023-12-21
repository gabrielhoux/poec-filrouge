import axios from 'axios'

// Récupération du token CSRF
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

async function fetchSearchAPICredentials() {
  try {
    const response = await axios(`http://127.0.0.1:8000/api/customsearch-key`);
    const data = response.data;

    return data;

  } catch (error) {
    console.error(error);
  }
  }

export async function fetchImage(titreRecette)
{
    const credentials = await fetchSearchAPICredentials();
    const apiKey = credentials.apiKey;
    const searchEngineId = credentials.searchEngineId;
    const apiUrl = `https://www.googleapis.com/customsearch/v1?key=${apiKey}&searchType=image&cx=${searchEngineId}&q=${titreRecette}`
    
    try {
      const response = await axios.get(apiUrl);
      const data = await response.json();
      const firstImageURL = data.items[0].link;
  
      return firstImageURL;
  
    } catch (error) {
      console.log(error);
  
      const placeholderImgUrl = "https://decizia.com/blog/wp-content/uploads/2017/06/default-placeholder.png";
      return placeholderImgUrl;
    }
}