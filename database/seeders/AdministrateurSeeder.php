<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Administrateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdministrateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "contact" => "0102030405",
            "email" => "admin@gmail.com",
            "password" => Hash::make('12345678')
        ]);

        // assign role
        $user->assignRole('super-administrateur');

        Administrateur::create([
            "user_id" => $user->id,
            "ville_id" => 1,
            "nom" => "John",
            "prenom" => "Doe",
            "contact" => "0102030405",
            "email" => $user->email,
            "Sexe" => "M",
            "adresse" => "Abidjan, Cocody Riviera Palmeraie",
        ]);


        $user2 = User::create([
            "contact" => "0707070707",
            "email" => "jeanfolier@gmail.com",
            "password" => Hash::make('12345678')
        ]);

        // assign role
        $user2->assignRole('administrateur');

        Administrateur::create([
            "user_id" => $user2->id,
            "ville_id" => 1,
            "nom" => "Jean",
            "prenom" => "Folier",
            "contact" => "0707070707",
            "email" => $user2->email,
            "Sexe" => "M",
            "adresse" => "Abidjan, Cocody Riviera Bonoumin",
        ]);



        $user3 = User::create([
            "contact" => "2727272727",
            "email" => "chambreregionale1@gmail.com",
            "password" => Hash::make('12345678')
        ]);

        // assign role
        $user3->assignRole('chambre-regionale');

        Administrateur::create([
            "user_id" => $user3->id,
            "ville_id" => 1,
            "nom" => "Kone",
            "prenom" => "Franck",
            "contact" => "2727272727",
            "email" => $user3->email,
            "Sexe" => "M",
            "adresse" => "Abidjan, Cocody Riviera",
        ]);
    }
}
