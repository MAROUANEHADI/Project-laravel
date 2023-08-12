<?php

namespace Database\Factories;

use App\Models\Devis;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailDevis>
 */
class DetailDevisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'quantite' => fake()->numberBetween(100 ,200),
            'prix_ht' => fake()->numberBetween(29 ,3987),
            'tva' => 20,
            'service_id' => Service::all()->random()->id,
            'devis_id' => Devis::all()->random()->id,
        ];
    }
}
