<?php

namespace Database\Seeders;

use App\Models\TypeDocument;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeDocument::create([
            'libelle' => "CNI",
            'description' => "Carte Nationale d'Identité"
        ]);

        TypeDocument::create([
            'libelle' => "CC",
            'description' => "Carte"
        ]);

        TypeDocument::create([
            'libelle' => "Carte de Résident",
            'description' => "Carte de Résident"
        ]);

        TypeDocument::create([
            'libelle' => "PASSEPORT",
            'description' => "Passeport"
        ]);

        TypeDocument::create([
            'libelle' => "Autre",
            'description' => "Autre"
        ]);
    }
}
