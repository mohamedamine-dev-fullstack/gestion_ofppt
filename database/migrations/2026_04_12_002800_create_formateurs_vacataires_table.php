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
        Schema::create('formateurs_vacataires', function (Blueprint $table) {
            
            $table->foreignId('id_personnel')
                  ->primary()
                  ->constrained('formateurs', 'id_personnel')
                  ->cascadeOnDelete();
           
            //infos professionnelles
            $table->string('specialite_enseignee')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formateurs_vacataires');
    }
};
