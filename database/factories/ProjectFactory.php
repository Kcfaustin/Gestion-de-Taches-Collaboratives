<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement(['en cours', 'terminé']),
            'user_id' => null, // Assigné dans le seeder
        ];
    }
}
