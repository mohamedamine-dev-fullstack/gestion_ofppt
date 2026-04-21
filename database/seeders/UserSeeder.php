<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('123456'),
            'role' => 'directeur du complexe',
            'id_personnel' => null
        ]);

        User::create([
            'name' => 'Gestionnaire',
            'email' => 'gestion@test.com',
            'password' => Hash::make('123456'),
            'role' => 'gestionnaire CFMR',
            'id_personnel' => null
        ]);
    }
}