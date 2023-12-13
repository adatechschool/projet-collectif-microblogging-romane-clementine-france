<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;
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

    // public function test_post_is_in_database():void
    // {
    //     $user = User::factory()->create();
    //     //ici on vérifie que la database contient ce que nous venons de lui envoyer en lui redemandant les données rentrées plus haut

    //     $response = $this->post ([
    //         'user_id' => '51',
    //         'content' => 'Coucou',
    //         'image' => 'Post creation image',
    //     ]);

    //     $response ->assertDatabaseHas();
    //     //cette ligne permet de rediriger l'utilsateur vers la home page une fois que le post est validé par l'utilisateur

    // }

public function test_create_new_post(): void
{
    // Créer des données de post simulées
    $postData = [
        'user_id' => '51',
        'title' => 'Nouveau Post',
        'content' => 'Contenu du nouveau post.',
    ];

    // Effectuer une requête POST pour créer un nouveau post
    $response = $this->post('/posts', $postData);

    // Vérifier que la création du post a réussi (statut HTTP 201 - Created)
    // $response->assertStatus(201);

    // Vérifier que le post a été correctement enregistré dans la base de données
    $this->assertDatabaseHas('posts', $postData);

    // Vérifier que le post existe dans la base de données en utilisant le modèle
    $this->assertDatabaseHas('posts', [
        'title' => 'Nouveau Post',
        'content' => 'Contenu du nouveau post.',
    ]);

    // Facultatif : Vous pouvez également vérifier d'autres aspects de la réponse, par exemple, la redirection
    $response->assertRedirect('/posts'); // Assurez-vous d'ajuster l'URL de redirection selon vos besoins
}
}


