<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use Exception;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Créer des données d'exemple pour les ingrédients
            $ingredients = [
                ['name' => "sel"],
                ['name' => "poivre"],
                ['name' => "farine"],
                ['name' => "beurre"],
                ['name' => "oeuf"],
                ['name' => "huile végétale"],
                ['name' => "pâtes"],
                ['name' => "riz"],
                ['name' => "pomme de terre"],
                ['name' => "ail"],
                ['name' => "oignon"],
            ];

            foreach ($ingredients as $data) {
                // Utilisation de firstOrCreate pour éviter les doublons
                Ingredient::firstOrCreate($data);
            }
            
        } catch(Exception $e) {
            echo $e;
        }
    }
}
