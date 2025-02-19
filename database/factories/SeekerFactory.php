<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\seeker>
 */
class SeekerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'skills' => $this->faker->randomElement([
                'PHP, Laravel, MySQL',
                'JavaScript, React, Node.js',
                'Python, Django, AI/ML',
                'DevOps, Docker, Kubernetes'
            ]),
            'personalImage' => 'default.png',
            'experience' => $this->faker->paragraph(3),
        ];
    }
}
