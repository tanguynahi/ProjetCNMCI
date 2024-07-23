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
        Schema::create('activite_artisans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chambre_regionale_id')->constrained('chambre_regionales', 'id');
            $table->foreignId('type_entreprise_id')->constrained('type_entreprises', 'id');
            $table->foreignId('agent_id')->nullable()->constrained('agents', 'id');
            $table->foreignId('artisan_id')->constrained('artisans', 'id');
            $table->string('numero_identification');
            $table->string('denomination_entreprise');
            $table->string('adresse_postale')->nullable();
            $table->string('contact_entreprise');
            $table->string('email_entreprise')->nullable();
            
            $table->string('regime_fiscal');
            $table->integer('nombre_associes');
            $table->integer('duree_personne_morale');
            $table->bigInteger('capital_social');
            $table->string('numero_cnps');
            $table->string('numero_compte_contribuable');
            $table->foreignId('type_activite_id')->constrained('type_activites', 'id');
            $table->string('activite_secondaire');
            $table->string('raison_social');
            $table->string('sigle_ou_enseigne');
            $table->string('objet_social');
            $table->date('date_debut_activite');
            $table->string('departement')->nullable();
            $table->foreignId('sous_prefecture_id')->constrained('sous_prefectures', 'id');
            $table->foreignId('commune_id')->constrained('communes', 'id');
            $table->string('quartier')->nullable();
            $table->string('village')->nullable();
            $table->string('numero_lot');
            $table->string('numero_ilot');
            $table->integer('nombre_compagnon');
            $table->integer('nombre_apprenti');
            $table->text('lien_google_map')->nullable();
            $table->string('annee_duree_personne_morale');
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
        Schema::dropIfExists('activite_artisans');
    }
};
