<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\DetailDevis;
use App\Models\Devis;
use App\Models\Facture;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Service::factory(1000)->create();
        // Client::factory(1000)->create();
        Facture::factory(1000)->create();
        // Devis::factory(1000)->create();
        // DetailDevis::factory(7000)->create();
    }
}
