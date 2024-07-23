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
        Schema::create('gerants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chambre_regionale_id')->constrained('chambre_regionales','id');
            $table->foreignId('agent_id')->nullable()->constrained('agents','id');
            $table->foreignId('artisan_id')->constrained('artisans','id');
            $table->foreignId('activite_artisan_id')->constrained('activite_artisans','id');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string("sexe_gerant");
            $table->foreignId('type_document_id')->constrained('type_documents','id');
            $table->string('lien_type_document')->nullable();
            $table->string('autre_document')->nullable();
            $table->string('numero_document')->nullable();
            $table->string('lieu_delivrance_document')->nullable();
            $table->date('date_delivrance_document')->nullable();
            $table->string('nationalite_gerant');
            $table->string('adresse');
            $table->string('contact');
            $table->string('contact_whatsapp');
            $table->string("niveau_etude");
            $table->string("classe_gerant")->nullable();
            $table->string("diplome_etude_obtenu")->nullable();
            $table->string("apprentissage_metier");
            $table->string("niveau_metier")->nullable();
            $table->string("diplome_metier_obtenu")->nullable();
            $table->string('diplome_cnmci')->nullable();
            $table->string('etat_civil');
            $table->string('email')->nullable();
            $table->string('lien_photo')->nullable();
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
        Schema::dropIfExists('gerants');
    }
};
