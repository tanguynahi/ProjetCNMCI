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
        Schema::create('facturations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chambre_regionale_id')->constrained('chambre_regionales','id');
            $table->foreignId('taxe_id')->constrained('taxes','id');
            $table->foreignId('groupe_id')->constrained('groupes','id');
            $table->foreignId('activite_artisan_id')->constrained('activite_artisans','id');
            $table->bigInteger('entite_id');
            $table->string('libelle');
            $table->bigInteger('total_apayer');
            $table->bigInteger('reste_apayer')->nullable();
            $table->bigInteger('total_payer')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->date('date_facturation');
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
        Schema::dropIfExists('facturations');
    }
};
