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

            $table->id('idPersonnel'); // مهم
            
            $table->enum('type_personnel', ['formateur', 'administratif']);
            $table->enum('statut', ['permanent', 'vacataire']);
            
            // 1. Informations personnelles
            $table->string('CIN')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance')->nullable();
            $table->string('situation_familiale')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('grade')->nullable();
            $table->string('echelon')->nullable();
            $table->string('fonction')->nullable();

            // 3. Personne à contacter
            $table->string('contact_nom')->nullable();
            $table->string('contact_telephone', 20)->nullable();
            
            //relations
             $table->foreignId('idEtab')
                   ->constrained('etablissements', 'idEtab')
                   ->onDelete('cascade');

             $table->foreignId('idSpecialiteOrigine')
                   ->nullable()
                   ->constrained('specialites', 'idSpecialite')
                   ->nullOnDelete();
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
