<?php

namespace Database\Seeders;

use App\Models\TypeActivite;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeActivite::create([
            'branche_activite_id'=>1,
            'libelle' => "COUTURE",
            'description' => ""
        ]);

        TypeActivite::create([
            'branche_activite_id'=>1,
            'libelle' => "SOUDURE",
            'description' => ""
        ]);

        TypeActivite::create([
            'branche_activite_id'=>1,
            'libelle' => "BOUCHER",
            'description' => ""
        ]);

        TypeActivite::create([
            'branche_activite_id'=>2,
            'libelle' => "BARBIER",
            'description' => ""
        ]);

        TypeActivite::create([
            'branche_activite_id'=>2,
            'libelle' => "POTERIE",
            'description' => ""
        ]);

        TypeActivite::create([
            'branche_activite_id'=>2,
            'libelle' => "EPICERIE",
            'description' => ""
        ]);
    }
}
