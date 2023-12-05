<?php

use App\Http\Controllers\RecetteController;


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

Route::get("/fromIngredient", [RecetteController::class, "form"])
    ->name("fromIngredient");

Route::get('/recette', [RecetteController::class, 'afficher']);

