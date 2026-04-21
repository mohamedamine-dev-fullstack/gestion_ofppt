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
        Schema::create('absences', function (Blueprint $table) {
          
           $table->id('id_absence');
           $table->date('date_absence');
           $table->string('motif');

           //relation
           $table->foreignId('id_personnel')
                 ->constrained('personnels', 'id_personnel')
                 ->cascadeOnDelete();

                 
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
