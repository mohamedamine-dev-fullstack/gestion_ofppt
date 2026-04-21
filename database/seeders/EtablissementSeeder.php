<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtablissementSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('etablissements')->insert([
            [
                'id_etab' => 1,
                'nom' => 'OFPPT Casa',
                'ville' => 'Casablanca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_etab' => 2,
                'nom' => 'OFPPT Rabat',
                'ville' => 'Rabat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_etab' => 3,
                'nom' => 'OFPPT Tanger',
                'ville' => 'Tanger',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}