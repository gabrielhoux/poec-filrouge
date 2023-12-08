<?php

use App\Http\Controllers\RecetteController;
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

Route::get('/', function () {
    return view('main');
});

// Route d'accès à la clé API
Route::get('/api/openai-key', function () {
    return response()->json([
        'apiKey' => env('OPENAI_API_KEY'),
    ]);
});


//Route::get("/formIngredient", [RecetteController::class, "form"])
   // ->name("formIngredient");

Route::get('/recette', [RecetteController::class, 'afficher']);

Route::match(['get', 'post'], '/', [IngredientController::class, 'showFormIngredient']);

Route::post('/', [IngredientController::class, 'store']);





