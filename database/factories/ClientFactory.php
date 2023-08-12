<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' =>fake()->name(),
            'prenom' =>fake()->name(),
            'nom_societe' => fake()->text(15),
            'telephone' => fake()->phoneNumber(),
            'ice' => fake()->numberBetween(2222222,7777777),
            'adresse' => fake()->address(),
            
        ];
    }
}
