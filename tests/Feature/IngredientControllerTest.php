<?php

use Tests\TestCase;
use App\Models\Ingredient;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngredientControllerTest extends TestCase
{
    use RefreshDatabase; // Assure que la base de données est réinitialisée entre chaque test

    public function testIndex()
    {
        // Crée quelques ingrédients fictifs dans la base de données
        Ingredient::factory()->count(5)->create();

        $response = $this->get('/api/ingredients');
        $response->assertStatus(200);
        $this->assertCount(5, $response->json());
    }

    public function testStoreWithValidData()
    {
        $data = ['name' => 'Pomme']; // Données valides

        $response = $this->post('/api/ingredients', $data);
        $response->assertStatus(200);

        // Vérifie si l'ingrédient a bien été ajouté à la base de données
        $this->assertDatabaseHas('ingredients', $data);
    }

    public function testStoreWithInvalidData()
    {
        $data = ['name' => '']; // Données invalides

        $response = $this->post('/api/ingredients', $data);
        $response->assertSessionHasErrors('name'); // Vérifie si des erreurs de validation sont renvoyées
    }

    public function testShow()
    {
        $ingredient = Ingredient::factory()->create();

        $response = $this->get('/api/ingredients/' . $ingredient->id);
        $response->assertStatus(200)
            ->assertJson(['name' => $ingredient->name]);
    }

    public function testDestroy()
    {
        $ingredient = Ingredient::factory()->create();

        $response = $this->delete('/api/ingredients/' . $ingredient->id);
        $response->assertStatus(200);

        // Vérifie si l'ingrédient a bien été supprimé de la base de données
        $this->assertModelMissing($ingredient);
    }
}
