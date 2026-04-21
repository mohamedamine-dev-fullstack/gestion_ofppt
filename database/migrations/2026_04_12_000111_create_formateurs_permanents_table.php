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
        Schema::create('formateurs_permanents', function (Blueprint $table) {
          
          
            $table->foreignId('id_personnel')
                  ->primary()
                  ->constrained('formateurs', 'id_personnel')
                  ->cascadeOnDelete();

          $table->string('matricule')->unique();
          $table->date('date_recrutement')->nullable();
          $table->string('grade')->nullable();
          $table->integer('echelon')->nullable();
          $table->string('fonction')->nullable();
         
          $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formateurs_permanents');
    }
};
