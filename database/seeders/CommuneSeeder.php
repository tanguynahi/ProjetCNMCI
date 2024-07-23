<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commune::create([
            'chambre_regionale_id' => 1,
            'libelle' => "Commune de Cocody",
            'description' => ""
        ]);

        Commune::create([
            'chambre_regionale_id' => 1,
            'libelle' => "Commune de Plateau",
            'description' => ""
        ]);

        Commune::create([
            'chambre_regionale_id' => 1,
            'libelle' => "Commune de Yopougon",
            'description' => ""
        ]);


        Commune::create([
            'chambre_regionale_id' => 3,
            'libelle' => "Ahougnanssou",
            'description' => ""
        ]);

        Commune::create([
            'chambre_regionale_id' => 3,
            'libelle' => "Air france 1",
            'description' => ""
        ]);

        Commune::create([
            'chambre_regionale_id' => 3,
            'libelle' => "Municipale",
            'description' => ""
        ]);


    }
}
