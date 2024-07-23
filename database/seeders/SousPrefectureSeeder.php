<?php

namespace Database\Seeders;

use App\Models\SousPrefecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SousPrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SousPrefecture::create([
            'chambre_regionale_id' => 1,
            'libelle' => "Abidjan Nord",
            'description' => ""
        ]);

        SousPrefecture::create([
            'chambre_regionale_id' => 1,
            'libelle' => "Abidjan Sud",
            'description' => ""
        ]);


        SousPrefecture::create([
            'chambre_regionale_id' => 3,
            'libelle' => "Bouaké Nord",
            'description' => ""
        ]);

        SousPrefecture::create([
            'chambre_regionale_id' => 3,
            'libelle' => "Bouaké Centre",
            'description' => ""
        ]);

        SousPrefecture::create([
            'chambre_regionale_id' => 3,
            'libelle' => "Bouaké Sud",
            'description' => ""
        ]);
    }
}
