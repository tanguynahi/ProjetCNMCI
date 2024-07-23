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
        Schema::create('type_activites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branche_activite_id')->constrained('branche_activites','id');
            $table->string('libelle');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('type_activites');
    }
};
