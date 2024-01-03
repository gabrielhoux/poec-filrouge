<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Ingredient;

class RecetteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_form_returns_view_with_ingredients()
    {
        $ingredientNames = ['Ingredient 1', 'Ingredient 2', 'Ingredient 3'];
        Ingredient::factory()->create(['name' => $ingredientNames[0]]);
        Ingredient::factory()->create(['name' => $ingredientNames[1]]);
        Ingredient::factory()->create(['name' => $ingredientNames[2]]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('ingredients', $ingredientNames);
    }
}
