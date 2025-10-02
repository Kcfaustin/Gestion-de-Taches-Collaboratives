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
        // Créer un administrateur s'il n'existe pas déjà
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password1234'),
                'usertype' => 'admin',
                'email_verified_at' => now(), // Email vérifié automatiquement
            ]);
        }

        // Créer des utilisateurs normaux avec usertype = user (sans Faker pour la production)
        $users = [
            [
                'name' => 'Jean Dupont',
                'email' => 'jean.dupont@example.com',
                'password' => Hash::make('password123'),
                'usertype' => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Marie Martin',
                'email' => 'marie.martin@example.com',
                'password' => Hash::make('password123'),
                'usertype' => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Pierre Durand',
                'email' => 'pierre.durand@example.com',
                'password' => Hash::make('password123'),
                'usertype' => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Sophie Bernard',
                'email' => 'sophie.bernard@example.com',
                'password' => Hash::make('password123'),
                'usertype' => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Lucas Moreau',
                'email' => 'lucas.moreau@example.com',
                'password' => Hash::make('password123'),
                'usertype' => 'user',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            // Créer l'utilisateur s'il n'existe pas déjà
            if (!User::where('email', $userData['email'])->exists()) {
                User::create($userData);
            }
        }
    }
}
