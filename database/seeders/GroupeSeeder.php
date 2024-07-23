<?php

namespace Database\Seeders;

use App\Models\Groupe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Groupe::create([
            'libelle' => "Personne morale",
            'description' => "Personne morale"
        ]);

        Groupe::create([
            'libelle' => "Personne physique",
            'description' => "Personne physique"
        ]);

        Groupe::create([
            'libelle' => "Carte Membre",
            'description' => "Carte Membre"
        ]);
    }
}
