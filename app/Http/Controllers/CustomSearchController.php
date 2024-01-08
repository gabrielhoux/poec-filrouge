<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CustomSearchController extends Controller
{
    public function fetchImage($titreRecette)
    {
        // Fetch the CSRF token from the session
        $csrfToken = Session::token();
        // Fetch the search API credentials and construct the API URL
        $credentials = $this->fetchSearchAPICredentials();
        $apiKey = $credentials['apiKey'];
        $searchEngineId = $credentials['searchEngineId'];
        $apiUrl = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&searchType=image&cx={$searchEngineId}&q={$titreRecette}";

        // Make a server-side request to the Custom Search API
        $response = Http::withHeaders([
            'X-CSRF-TOKEN' => $csrfToken,
            'Content-Type' => 'application/json'
        ])->get($apiUrl);

        // Return the image URL or a placeholder URL based on the response
        if ($response->successful()) {
            $data = $response->json();
            $firstImageURL = $data['items'][0]['link'];
            return $firstImageURL;
        } else {
            return "https://img.freepik.com/premium-photo/steaming-hot-soup-bowl-made-wood-smoke-discerning-concentration_410516-40382.jpg";
        }
    }

    private function fetchSearchAPICredentials()
    {
        $credentials = [
            'apiKey' => env('CUSTOMSEARCH_API_KEY'),
            'searchEngineId' => env('SEARCH_ENGINE_ID')
        ];

        return $credentials;
    }
}
