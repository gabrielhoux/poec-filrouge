<?php

use App\Http\Controllers\RecetteController;
use App\Http\Controllers\CustomSearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RecetteController::class, 'form'])->name('form');

// Route d'accès à la clé API OpenAI
Route::get('/api/openai-key', function () {
    return response()->json([
        'apiKey' => env('OPENAI_API_KEY')
    ]);
});

// Route d'accès à la clé API Google Custom Search
/* Route::get('/api/customsearch-key', function () {
    return response()->json([
        'apiKey' => env('CUSTOMSEARCH_API_KEY'),
        'searchEngineId' => env('SEARCH_ENGINE_ID')
    ]);
}); */

Route::get('/api/fetch-image/{titreRecette}', [CustomSearchController::class, 'fetchImage'])->name('fetchImage');





