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
      Schema::create('users', function (Blueprint $table) {
        
        $table->id(); // id_user
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('role'); //$table->enum('role', ['directeur du complexe', 'gestionnaire CFMR']);

        //relation
        $table->foreignId('id_personnel')
              ->nullable()
              ->constrained('administratifs', 'id_personnel')
              ->nullOnDelete();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
