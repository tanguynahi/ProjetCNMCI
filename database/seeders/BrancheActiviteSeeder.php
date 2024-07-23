<?php

namespace Database\Seeders;

use App\Models\BrancheActivite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrancheActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BrancheActivite::create([
            'libelle' => "AGRICULTURE",
            'description' => ""
        ]);

        BrancheActivite::create([
            'libelle' => "AGRO-ALIMENTAIRE",
            'description' => ""
        ]);

        BrancheActivite::create([
            'libelle' => "MINE ET CARRIERE",
            'description' => ""
        ]);

        BrancheActivite::create([
            'libelle' => "CONSTRUCTION ET BATIMENT",
            'description' => ""
        ]);


        BrancheActivite::create([
            'libelle' => "TEXTILE, HABILLEMENT, CUIRE ET PEAU",
            'description' => ""
        ]);


        BrancheActivite::create([
            'libelle' => "METAUX, CONSTRUCTION METALIQUE",
            'description' => ""
        ]);

        BrancheActivite::create([
            'libelle' => "ARTISANTA D'ART",
            'description' => ""
        ]);


        BrancheActivite::create([
            'libelle' => "HYGIENE ET SOINS CORPORELS",
            'description' => ""
        ]);

        BrancheActivite::create([
            'libelle' => "BOIS ET ASSIMILES",
            'description' => ""
        ]);
    }
}
