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
        Schema::create('document_type_demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artisan_id')->nullable()->constrained('artisans','id');
            $table->foreignId('type_demande_id')->constrained('type_demandes','id');
            $table->string('libelle');
            $table->string('description');
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
        Schema::dropIfExists('document_type_demandes');
    }
};
