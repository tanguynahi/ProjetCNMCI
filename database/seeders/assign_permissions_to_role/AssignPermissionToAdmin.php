<?php

namespace Database\Seeders\assign_permissions_to_role;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssignPermissionToAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $SuperadminRole = Role::where("name","super-administrateur")->first();

        // $SuperadminRole->givePermissionTo([
        //     'Ajouter un admininistrateur',
        //     'Afficher un admininistrateur',
        //     'Modifier un admininistrateur',
        //     'Supprimer un admininistrateur',
        //     'Ajouter un parametre',
        //     'Afficher un parametre',
        //     'Modifier un parametre',
        //     'Supprimer un parametre',

        //     'voir la liste des administrateur',
        //     'voir la liste des parametres',
        //     'voir la liste des codes de validation',
        //     'voir la liste des types de compte',
        //     'voir la liste des paiements',
        //     'voir la liste des types de paiement',
        //     'voir la liste des corps d\'armee',
        //     'voir la liste des grades',
        //     'voir la liste des villes',

        // ]);


        // $adminRole = Role::where("name","administrateur")->first();

        // $adminRole->givePermissionTo([
        //     'Ajouter un parametre',
        //     'Afficher un parametre',
        //     'Modifier un parametre',
        //     'Supprimer un parametre',
        //     'Ajouter un mutualiste',
        //     'Afficher un mutualiste',
        //     'Modifier un mutualiste',
        //     'Ajouter une actualite',
        //     'Afficher une actualite',
        //     'Modifier une actualite',
        //     'Supprimer une actualite',


        //     'voir la liste des parametres',
        //     'voir la liste des codes de validation',
        //     'voir la liste des types de compte',
        //     'voir la liste des paiements',
        //     'voir la liste des types de paiement',
        //     'voir la liste des corps d\'armee',
        //     'voir la liste des grades',
        //     'voir la liste des villes',
        //     'voire la liste des mutualistes',
        //     'voir la liste des actualites',
        //     'voir la liste des directions',
        // ]);
    }
}
