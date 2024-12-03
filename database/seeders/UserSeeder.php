<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Créer un administrateur
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password1234'),
            'usertype' => 'admin',
        ]);

        // Créer des utilisateurs normaux avec usertype = user
        \App\Models\User::factory(5)->create([
            'usertype' => 'user',
        ]);
    }
}
