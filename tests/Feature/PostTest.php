<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use SebastianBergmann\Type\VoidType;
use Tests\TestCase;
use App\Models\User;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_form_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/dashboard/new');

        $response->assertStatus(200);
    }
    public function test_post_is_created(): void
    {
        $user = User::factory()->create();

        //ici, nous créons un post fictif pour vérifier si la création du post fonctionne
        $response = $this
            ->actingAs($user)
            ->post('/dashboard/new', [
            'user_id' => $user->id,
            'content' => 'Test post creation',
            'image' => 'Post creation image',
        ]);
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_post_is_in_database():void
    {
        $user = User::factory()->create();
        //ici on vérifie que la database contient ce que nous venons de lui envoyer en lui redemandant les données rentrées plus haut
        $response = $this->assertDatabaseHas('posts', [
            'user_id' => $user->id,
            'content' => 'Test post creation',
            'image' => 'Post creation image',
        ]);
        //cette ligne permet de rediriger l'utilsateur vers la home page une fois que le post est validé par l'utilisateur

    }
}


