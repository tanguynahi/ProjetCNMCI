<?php

namespace Database\Seeders;

use App\Models\TypeActivite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeActivite::create([
            'libelle' => "COUTURE",
            'description' => ""
        ]);

        TypeActivite::create([
            'libelle' => "SOUDURE",
            'description' => ""
        ]);

        TypeActivite::create([
            'libelle' => "BOUCHER",
            'description' => ""
        ]);

        TypeActivite::create([
            'libelle' => "BARBIER",
            'description' => ""
        ]);

        TypeActivite::create([
            'libelle' => "POTERIE",
            'description' => ""
        ]);

        TypeActivite::create([
            'libelle' => "EPICERIE",
            'description' => ""
        ]);
    }
}
