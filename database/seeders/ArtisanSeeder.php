<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            "contact" => "0102030405",
            "email" => "admin@gmail.com",
            "password" => Hash::make('12345678')
        ]);

        // assign role
        $user->assignRole('super-administrateur');
    }
}
