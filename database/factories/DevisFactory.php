<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Devis>
 */
class DevisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ice' => fake()->numberBetween(2222222,7777777),
            'nom_societe' => fake()->text(15),
            'objet' => fake()->text(20),
            'date' => fake()->date('Y-m-d'),
            'client_id' => Client::all()->random()->id,
        ];
    }
}
