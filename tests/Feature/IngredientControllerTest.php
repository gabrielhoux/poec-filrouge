<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Ingredient;

class IngredientControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_ingredients()
    {
        $ingredient = Ingredient::factory()->create();
        $response = $this->get('/ingredients');
        $response->assertStatus(200);
        $response->assertJson([$ingredient->toArray()]);
    }

    public function test_store_creates_new_ingredient()
    {
        $data = ['name' => 'Test Ingredient'];
        $response = $this->post('/ingredients', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('ingredients', $data);
    }

    public function test_show_returns_specific_ingredient()
    {
        $ingredient = Ingredient::factory()->create();
        $response = $this->get("/ingredients/{$ingredient->id}");
        $response->assertStatus(200);
        $response->assertJson($ingredient->toArray());
    }

    public function test_destroy_deletes_specific_ingredient()
    {
        $ingredient = Ingredient::factory()->create();
        $response = $this->delete("/ingredients/{$ingredient->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('ingredients', ['id' => $ingredient->id]);
    }
}