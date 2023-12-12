<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ParametersTest extends TestCase
{

    // Permet de rafraichir la base de données de tests
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_parameters_page_is_displayed(): void
    {
        // Création d'un user factice pour le test
        $user = User::factory()->create();

        $response = $this
        // Fake user
        ->actingAs($user)
        // On vérifie qu'on arrive bien sur cet URL
        ->get('/parameters');

        $response->assertStatus(200);
    }
}
