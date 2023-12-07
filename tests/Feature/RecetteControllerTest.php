<?php

use Tests\TestCase;

class RecetteControllerTest extends TestCase
{
    public function testForm()
    {
        $response = $this->get('/formIngredient');
        $response->assertViewIs('formIngredient');
    }

    public function testAfficher()
    {
        // Créer un objet Request simulé avec des données
        $response = $this->post('/recette', ['test' => 'data']);
        $response->assertViewIs('recette'); // Vérifier si la vue retournée est correcte
        // Ajouter d'autres assertions pour vérifier les données retournées
    }
}
