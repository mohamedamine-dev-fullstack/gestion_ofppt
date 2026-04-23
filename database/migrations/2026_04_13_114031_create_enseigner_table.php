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
        Schema::create('enseigner', function (Blueprint $table) {
            $table->unsignedBigInteger('idPersonnel');
            $table->unsignedBigInteger('idDiplome');

            $table->primary(['idPersonnel', 'idDiplome']);

            $table->foreign('idPersonnel')
                 ->references('idPersonnel')
                 ->on('personnels')
                ->onDelete('cascade');

            $table->foreign('idDiplome')
                 ->references('idDiplome')
                 ->on('diplomes')
                 ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseigner');
    }
};
