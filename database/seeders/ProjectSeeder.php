<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Obtenir tous les utilisateurs
        $users = User::all();

        // Données de projets
        $projects = [
            ['title' => 'Projet CRM', 'description' => 'Développer un système CRM.', 'deadline' => '2024-12-31', 'status' => 'en cours'],
            ['title' => 'Application Mobile', 'description' => 'Créer une application Flutter.', 'deadline' => '2025-01-15', 'status' => 'en cours'],
            ['title' => 'Plateforme E-commerce', 'description' => 'Lancer une boutique en ligne.', 'deadline' => '2025-02-01', 'status' => 'terminé'],
        ];

        foreach ($users as $user) {
            foreach ($projects as $project) {
                Project::create([
                    'title' => $project['title'],
                    'description' => $project['description'],
                    'deadline' => $project['deadline'],
                    'status' => $project['status'],
                    'user_id' => $user->id,
                ]);
            }
        }

        // Assigner des projets à chaque utilisateur
        foreach ($users as $user) {
            Project::factory(rand(1, 5))->create([
                'user_id' => $user->id,
            ]);
        }
    }
}


