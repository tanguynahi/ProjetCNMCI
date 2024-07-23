<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chambre_regionale_id')->constrained('chambre_regionales','id');
            $table->foreignId('artisan_id')->nullable()->constrained('artisans','id');
            $table->foreignId('type_demande_id')->constrained('type_demandes','id');
            $table->string('motif');
            $table->string('commentaires')->nullable();
            $table->enum('avis',["Acceptée","Refusée"])->default("Refusée");
            $table->string("motif_refus")->nullable();
            $table->enum('status',[1,2,3])->default(2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
