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
        Schema::create('carte_membres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chambre_regionale_id')->constrained('chambre_regionales','id');
            $table->foreignId('artisan_id')->nullable()->constrained('artisans','id');
            $table->foreignId('activite_artisan_id')->nullable()->constrained('activite_artisans','id');
            $table->bigInteger('membre_id');
            $table->enum('type_carte',['Artisan','Compagnon','Apprenti']);
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
        Schema::dropIfExists('carte_membres');
    }
};
