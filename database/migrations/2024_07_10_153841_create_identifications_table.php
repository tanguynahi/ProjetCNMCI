<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('identifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administrateur_id')->nullable()->constrained('administrateurs', 'id');
            $table->foreignId('chambre_regionale_id')->constrained('chambre_regionales', 'id');
            $table->foreignId('type_entreprise_id')->constrained('type_entreprises', 'id');
            $table->string('numero_identification')->unique();
            $table->string('denomination_entreprise');
            $table->string('adresse_postale')->nullable();
            $table->string('contact_entreprise');
            $table->string('email_entreprise')->nullable();
            $table->string('registre_entreprise');
            $table->string('numero_registre');
            $table->string('regime_fiscal');
            $table->integer('nombre_associes');
            $table->integer('duree_personne_morale');
            $table->string('annee_duree_personne_morale');

            $table->bigInteger('capital_social');
            $table->string('numero_cnps')->nullable();
            $table->string('numero_compte_contribuable');
            $table->foreignId('type_activite_id')->constrained('type_activites', 'id');
            $table->string('activite_secondaire')->nullable();
            $table->string('raison_social');
            $table->string('sigle_ou_enseigne');
            $table->string('objet_social'); // Changed to TEXT
            $table->date('date_debut_activite');
            $table->string('departement')->nullable();
            $table->foreignId('sous_prefecture_id')->constrained('sous_prefectures', 'id');
            $table->foreignId('commune_id')->constrained('communes', 'id');
            $table->string('quartier')->nullable();
            $table->string('village')->nullable();
            $table->string('numero_lot');
            $table->string('numero_ilot');
            $table->integer('nombre_compagnon')->nullable();
            $table->integer('nombre_apprenti')->nullable();
            $table->text('lien_google_map')->nullable(); // Changed to TEXT
            $table->string('nom_artisan');
            $table->string('prenom_artisan');
            $table->date('date_naissance_artisan');
            $table->string('lieu_naissance_artisan');
            $table->string("sexe_artisan");
            $table->foreignId('type_document_id')->constrained('type_documents', 'id');
            $table->text('lien_type_document_artisan')->nullable(); // Changed to TEXT
            $table->text('autre_document_artisan')->nullable(); // Changed to TEXT
            $table->string('numero_document_artisan')->nullable();
            $table->string('lieu_delivrance_document_artisan')->nullable();
            $table->date('date_delivrance_document_artisan')->nullable();
            $table->string('nationalite_artisan')->nullable();
            $table->string('adresse_artisan');
            $table->string('contact_artisan')->unique();
            $table->string('contact_whatsapp')->unique();
            $table->string('etat_civil_artisan');
            $table->string('etes_gerant');
            $table->string('email_artisan')->unique()->nullable();
            $table->text("lien_photo_artisan")->nullable(); // Changed to TEXT
            $table->string("niveau_etude");
            $table->string("classe")->nullable();
            $table->string("diplome_etude_obtenu")->nullable();
            $table->string("apprentissage_metier");
            $table->string("niveau_metier_artisan")->nullable();
            $table->string("diplome_metier_obtenu")->nullable();
            $table->string('diplome_cnmci')->nullable();
            $table->string('nom_gerant');
            $table->string('prenom_gerant');
            $table->date('date_naissance_gerant');
            $table->string('lieu_naissance_gerant');
            $table->string("sexe_gerant");
            $table->bigInteger('gerant_type_document_id');
            $table->text('lien_type_document_gerant')->nullable(); // Changed to TEXT
            $table->text('autre_document_gerant')->nullable(); // Changed to TEXT
            $table->string('numero_document_gerant')->nullable();
            $table->string('lieu_delivrance_document_gerant')->nullable();
            $table->date('date_delivrance_document_gerant')->nullable();
            $table->string('nationalite_gerant');
            $table->string('adresse_gerant');
            $table->string('contact_gerant')->unique();
            $table->string('contact_whatsapp_gerant')->unique();
            $table->string("niveau_etude_gerant");
            $table->string("classe_gerant")->nullable();
            $table->string("diplome_etude_obtenu_gerant")->nullable();
            $table->string("apprentissage_metier_gerant");
            $table->string("niveau_metier_gerant")->nullable();
            $table->string("diplome_metier_obtenu_gerant");
            $table->string('diplome_cnmci_gerant')->nullable();
            $table->string('etat_civil_gerant');
            $table->string('email_gerant');
            $table->text("lien_photo_gerant")->nullable(); // Changed to TEXT
            $table->string('declaration_maitrise_metier');
            $table->string('declaration_honneur');
            $table->string('accepte_confidentialite');
            $table->text('signature')->nullable(); // Changed to TEXT
            $table->enum('avis', ['En Attente', 'Acceptée', 'Refusée'])->default('En Attente');
            $table->string("motif_refus")->nullable();
            $table->enum('status', [1, 2, 3])->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identifications');
    }
};
