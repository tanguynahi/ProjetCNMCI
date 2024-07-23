<?php

namespace Database\Seeders;

use App\Models\TypeEntreprise;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeEntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeEntreprise::create([
            'groupe_id' => 2,
            'libelle' => "Artisan",
            'description' => "Personne physique"
        ]);

        TypeEntreprise::create([
            'groupe_id' => 1,
            'libelle' => "Entreprise Individuelle",
            'description' => "Entreprise Individuelle"
        ]);

        TypeEntreprise::create([
            'groupe_id' => 1,
            'libelle' => "SARL",
            'description' => "SARL"
        ]);

        TypeEntreprise::create([
            'groupe_id' => 1,
            'libelle' => "SARLU",
            'description' => "SARLU"
        ]);


        TypeEntreprise::create([
            'groupe_id' => 1,
            'libelle' => "GIE",
            'description' => "GIE"
        ]);

        TypeEntreprise::create([
            'groupe_id' => 1,
            'libelle' => "Organisation professionnelle",
            'description' => "Organisation professionnelle"
        ]);
    }
}
