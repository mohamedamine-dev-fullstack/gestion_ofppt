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
                'cin' => 'AA12345',
                'nom' => 'Amine',
                'prenom' => 'Test',
                'type_personnel' => 'formateur',
                'statut' => 'permanent',
                'date_naissance' => '1995-01-01',
                'telephone' => '0600000000',
                'idEtab' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'cin' => 'BB67890',
                'nom' => 'Sara',
                'prenom' => 'Ali',
                'type_personnel' => 'formateur',
                'statut' => 'permanent',
                'date_naissance' => '2006-01-01',
                'telephone' => '0700000000',
                'idEtab' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}