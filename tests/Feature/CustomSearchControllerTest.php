<?php

use App\Http\Controllers\CustomSearchController;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CustomSearchControllerTest extends TestCase
{
    public function testFetchImageReturnsValidURL()
    {
        // Mock the Http facade to return a successful response
        Http::fake([
            '*' => Http::response(['items' => [['link' => 'https://example.com/image.jpg']]], 200)
        ]);

        // Create an instance of the CustomSearchController
        $controller = new CustomSearchController();

        // Call the fetchImage method with a mock recipe title
        $imageURL = $controller->fetchImage('mock_recipe');

        // Assert that the returned URL matches the expected URL
        $this->assertEquals('https://example.com/image.jpg', $imageURL);
    }

    public function testFetchImageReturnsPlaceholderURLOnFailure()
    {
        // Mock the Http facade to return an unsuccessful response
        Http::fake([
            '*' => Http::response([], 500)
        ]);

        // Create an instance of the CustomSearchController
        $controller = new CustomSearchController();

        // Call the fetchImage method with a mock recipe title
        $imageURL = $controller->fetchImage('mock_recipe');

        // Assert that the returned URL is the placeholder URL
        $this->assertEquals('https://img.freepik.com/premium-photo/steaming-hot-soup-bowl-made-wood-smoke-discerning-concentration_410516-40382.jpg', $imageURL);
    }
}