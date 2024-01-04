<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function form()
    {
        $ingredients = Ingredient::pluck('name');
        return view('main', ['ingredients' => $ingredients]);
    }
}

        