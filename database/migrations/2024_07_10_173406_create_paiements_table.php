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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chambre_regionale_id')->constrained('chambre_regionales', 'id');
            $table->foreignId('artisan_id')->constrained('artisans', 'id');
            $table->foreignId('activite_artisan_id')->constrained('activite_artisans', 'id');
            $table->foreignId('facturation_id')->constrained('facturations', 'id');
            $table->string('reference')->nullable();
            $table->string('code_paiement')->nullable();
            $table->bigInteger('montant_initial');
            $table->bigInteger('frais')->nullable();
            $table->bigInteger('montant_total');
            $table->string('moyen_paiement')->nullable();
            $table->string('contact_paiement')->nullable();
            $table->date('date_paiement_final')->nullable();
            $table->date('heure_paiement_final')->nullable();
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
        Schema::dropIfExists('paiements');
    }
};
