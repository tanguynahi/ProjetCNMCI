<?php

namespace Database\Seeders;

use App\Models\BrancheActivite;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

     




    }
}
