import axios from 'axios'

document.addEventListener('DOMContentLoaded', () => {

    fetchImage();

})

async function fetchSearchAPICredentials() {
    try {
      const response = await fetch(`/api/customsearch-key`);
      const data = await response.json();
  
      return data;
  
    } catch (error) {
      console.error(error);
    }
  }

async function fetchImage()
{

    const imgContainer = document.getElementById('imgContainer');
    while (imgContainer.firstChild && imgContainer.removeChild(imgContainer.firstChild));

    const recipeTitle = document.getElementById('recipeTitle').innerHTML;

    const credentials = await fetchSearchAPICredentials();
    const apiKey = credentials.apiKey;
    const searchEngineId = credentials.searchEngineId;
    const apiUrl = `https://www.googleapis.com/customsearch/v1?key=${apiKey}&searchType=image&cx=${searchEngineId}&q=${recipeTitle}`

    try {
        const response = await axios.get(apiUrl);
        const firstImageURL = response.data.items[0].link;

        console.log(response);

        const img = document.createElement('img');
        img.src = firstImageURL;
        imgContainer.appendChild(img);
      } catch (error) {
        console.log(error);
      }

}