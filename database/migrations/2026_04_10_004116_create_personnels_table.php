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
        Schema::create('personnels', function (Blueprint $table) {

            $table->id('id_personnel'); // مهم
            
            // 1. Informations personnelles
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('cin')->unique();
            $table->enum('situation_familiale', ['celibataire', 'marie', 'divorce', 'veuf'])->nullable();
            $table->integer('nombre_enfants')->nullable();
            $table->string('telephone', 20)->nullable();
            $table->text('adresse_actuelle')->nullable();

            // 2. Informations professionnelles
            $table->text('diplomes')->nullable();
             $table->text('specialite_origine')->nullable();
             
            // 3. Personne à contacter
            $table->string('contact_nom')->nullable();
            $table->string('contact_telephone', 20)->nullable();
            
            //relation
             $table->foreignId('id_etab')
                   ->constrained('etablissements', 'id_etab')
                   ->cascadeOnDelete();
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
