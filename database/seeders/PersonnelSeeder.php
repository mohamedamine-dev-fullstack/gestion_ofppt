<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonnelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('personnels')->insert([
            [
                'nom' => 'Amine',
                'prenom' => 'Test',
                'cin' => 'AA12345',
                'id_etab' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Sara',
                'prenom' => 'Ali',
                'cin' => 'BB67890',
                'id_etab' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}