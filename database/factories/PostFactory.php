<?php

namespace Database\Factories;
// namespace App\Console\Commands;

// use Illuminate\Console\Command;


use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        // On récupère les id du modèle User qui ont déjà été créés, puis on les stock dans un tableau $users. On fait ensuite un randomElement sur le tableau.
        $users = \App\Models\User::pluck('id')->toArray();
        return [
            'user_id' => fake()->randomElement($users),
            // Rest of attributes...
            'content' => fake()->text(),
            'image' => fake()->text(),
        ];
    }
}
