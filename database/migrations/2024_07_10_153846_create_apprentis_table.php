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
        Schema::create('apprentis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chambre_regionale_id')->constrained('chambre_regionales','id');
            $table->foreignId('user_id')->constrained('users','id');
            $table->foreignId('artisan_id')->constrained('artisans','id');
            $table->string('numero_cnps');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->foreignId('commune_id')->constrained('communes','id');
            $table->string('quartier');
            $table->string("sexe");
            $table->foreignId('type_document_id')->constrained('type_documents','id');
            $table->string('lien_type_document');
            $table->string('autre_document')->nullable();
            $table->string('numero_document')->nullable();
            $table->string('lieu_delivrance_document')->nullable();
            $table->date('date_delivrance_document')->nullable();
            $table->string('nationalite');
            $table->string('adresse');
            $table->string('contact')->unique();
            $table->string('contact_whatsapp')->unique();
            $table->string('etat_civil');
            $table->string('email')->unique()->nullable();
            $table->string("lien_photo")->nullable();
            $table->foreignId('type_activite_id')->constrained('type_activites','id');
            $table->date('date_debut_apprentissage');
            $table->date('date_debut_apprentissage_entreprise');
            $table->string('activite_exerce');
            $table->string("niveau_etude");
            $table->string("classe")->nullable();
            $table->string("diplome_etude_obtenu")->nullable();
            // $table->string("apprentissage_metier");
            // $table->string("niveau")->nullable();
            // $table->string("diplome_metier_obtenu")->nullable();
            // $table->string('diplome_cnmci');
            $table->string('signature')->nullable();
            $table->enum('status',[1,2,3])->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprentis');
    }
};
