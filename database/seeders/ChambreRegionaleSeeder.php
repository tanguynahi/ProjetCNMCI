<?php

namespace Database\Seeders;

use App\Models\ChambreRegionale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChambreRegionaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale d'Abidjan",
            'description' => ""
        ]);

        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale d'Agboville",
            'description' => ""
        ]);

        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale de Bouaké",
            'description' => ""
        ]);

        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale de Boundiali",
            'description' => ""
        ]);

        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale de Bondoukou",
            'description' => ""
        ]);

        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale de Daloa",
            'description' => ""
        ]);


        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale de Korhogo",
            'description' => ""
        ]);

        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale de Katiola",
            'description' => ""
        ]);

        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale de Man",
            'description' => ""
        ]);

        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale de San-Pédro",
            'description' => ""
        ]);

        ChambreRegionale::create([
            'administrateur_id' => 3,
            'libelle' => "Chambre Régionale de Yamoussoukro",
            'description' => ""
        ]);
    }
}
