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

        // Créer des projets supplémentaires pour chaque utilisateur (sans Faker)
        $additionalProjects = [
            ['title' => 'Site Web Portfolio', 'description' => 'Créer un portfolio personnel.', 'deadline' => '2025-03-01', 'status' => 'en cours'],
            ['title' => 'API REST', 'description' => 'Développer une API RESTful.', 'deadline' => '2025-03-15', 'status' => 'en cours'],
            ['title' => 'Système de Gestion', 'description' => 'Outil de gestion interne.', 'deadline' => '2025-04-01', 'status' => 'en cours'],
            ['title' => 'Application Web', 'description' => 'Application web moderne.', 'deadline' => '2025-04-15', 'status' => 'terminé'],
            ['title' => 'Base de Données', 'description' => 'Optimiser la base de données.', 'deadline' => '2025-05-01', 'status' => 'en cours'],
        ];

        foreach ($users as $user) {
            // Créer 2-3 projets supplémentaires par utilisateur
            $userProjects = array_slice($additionalProjects, 0, rand(2, 3));
            foreach ($userProjects as $project) {
                Project::create([
                    'title' => $project['title'] . ' - ' . $user->name,
                    'description' => $project['description'],
                    'deadline' => $project['deadline'],
                    'status' => $project['status'],
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}


