<?php

use App\Http\Controllers\RecetteController;
use App\Http\Controllers\CustomSearchController;
use App\Http\Controllers\IngredientController;
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

Route::get('/ingredients', [IngredientController::class, 'index']);
Route::post('/ingredients', [IngredientController::class, 'store']);
Route::get('/ingredients/{id}', [IngredientController::class, 'show']);
Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy']);

// Route d'accès à la clé API OpenAI
Route::get('/api/openai-key', function () {
    return response()->json([
        'apiKey' => env('OPENAI_API_KEY')
    ]);
});

Route::get('/api/fetch-image/{titreRecette}', [CustomSearchController::class, 'fetchImage'])->name('fetchImage');





