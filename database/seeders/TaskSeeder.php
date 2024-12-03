<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Données de tâches
        $tasks = [
            ['title' => 'Analyse des besoins', 'description' => 'Analyser les besoins du client.', 'status' => 'non commencé', 'priority' => 'haute'],
            ['title' => 'Conception de la base de données', 'description' => 'Créer les schémas de base de données.', 'status' => 'en cours', 'priority' => 'moyenne'],
            ['title' => 'Développement du backend', 'description' => 'Développer les API nécessaires.', 'status' => 'en cours', 'priority' => 'haute'],
            ['title' => 'Tests unitaires', 'description' => 'Réaliser les tests unitaires.', 'status' => 'non commencé', 'priority' => 'basse'],
            ['title' => 'Mise en production', 'description' => 'Déployer sur le serveur de production.', 'status' => 'terminé', 'priority' => 'haute'],
        ];

        // Assigner les tâches à chaque projet
        $projects = Project::all();

        foreach ($projects as $project) {
            foreach ($tasks as $task) {
                Task::create([
                    'title' => $task['title'],
                    'description' => $task['description'],
                    'status' => $task['status'],
                    'priority' => $task['priority'],
                    'project_id' => $project->id,
                    'assigned_to' => $project->user_id, // Assigné au propriétaire du projet
                ]);
            }
        }
    }
}

