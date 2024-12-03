<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['non commencé', 'en cours', 'terminé']),
            'priority' => $this->faker->randomElement(['basse', 'moyenne', 'haute']),
            'project_id' => Project::factory(), // Associe automatiquement à un projet
            'assigned_to' => User::factory(), // Optionnel : Associe à un utilisateur
        ];
    }
}

