<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TypeEntreprise;
use Illuminate\Database\Seeder;
use Database\Seeders\TaxeSeeder;
use Database\Seeders\VilleSeeder;
use Database\Seeders\GroupeSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CommuneSeeder;
use Database\Seeders\ParametreSeeder;
use Database\Seeders\roles\RoleSeeder;
use Database\Seeders\TypeActiviteSeeder;
use Database\Seeders\TypeDocumentSeeder;
use Database\Seeders\SousPrefectureSeeder;
use Database\Seeders\TypeEntrepriseSeeder;
use Database\Seeders\BrancheActiviteSeeder;
use Database\Seeders\ChambreRegionaleSeeder;
use Database\Seeders\permissions\PermissionSeeder;
use Database\Seeders\assign_permissions_to_role\AssignPermissionToAdmin;
use Database\Seeders\assign_permissions_to_role\AssignPermissionToAgent;
use Database\Seeders\assign_permissions_to_role\AssignPermissionToArtisan;
use Database\Seeders\assign_permissions_to_role\AssignPermissionToApprenti;
use Database\Seeders\assign_permissions_to_role\AssignPermissionToCompagnon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        DB::table('permissions')->delete();
        DB::table('roles')->delete();


        //create roles
        $this->call(RoleSeeder::class);

        //create permission
        $this->call(PermissionSeeder::class);

        // //assign permission to admin role
        // $this->call(AssignPermissionToAdmin::class);

        // //assign permission to artisan role
        // $this->call(AssignPermissionToArtisan::class);

        // //assign permission to agent
        // $this->call(AssignPermissionToAgent::class);

        // //assign permission to apprenti
        // $this->call(AssignPermissionToApprenti::class);$

        // //assign permission to compagnon
        // $this->call(AssignPermissionToCompagnon::class);

        //create groupe
        $this->call(GroupeSeeder::class);

        //create taxe
        $this->call(TaxeSeeder::class);

        //create City
        $this->call(VilleSeeder::class);

        //create BrancheActiviteSeeder
        $this->call(BrancheActiviteSeeder::class);

        //create TypeActiviteSeeder
        $this->call(TypeActiviteSeeder::class);

        //create TypeEntrepriseSeeder
        $this->call(TypeEntrepriseSeeder::class);

        //create TypeEntrepriseSeeder
        $this->call(TypeDocumentSeeder::class);

        //create Admin
        $this->call(AdministrateurSeeder::class);

        //create Chambre
        $this->call(ChambreRegionaleSeeder::class);

        //create sous-prefecture
        $this->call(SousPrefectureSeeder::class);

        //create commune
        $this->call(CommuneSeeder::class);

        $this->call([
            ParametreSeeder::class,
        ]);
    }
}
