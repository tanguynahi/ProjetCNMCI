<?php

namespace Database\Seeders;

use App\Models\Taxe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaxeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Taxe::create([
            'groupe_id' => 1,
            'libelle' => "Inscription Personne morale",
            'montant' => 25000,
            'description' => ""
        ]);

        Taxe::create([
            'groupe_id' => 2,
            'libelle' => "Inscription Personne physique",
            'montant' => 15000,
            'description' => ""
        ]);

        Taxe::create([
            'groupe_id' => 3,
            'libelle' => "Carte membre",
            'montant' => 5000,
            'description' => ""
        ]);

    }
}
