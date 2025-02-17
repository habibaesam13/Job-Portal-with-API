<?php

namespace Database\Factories;

use Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
//  */
class jobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'title' => fake()->jobTitle(),
        'description' => fake()->paragraph(4),
        'salary' => fake()->randomFloat(2, 40000, 150000),
        'employerId' => \App\Models\Employer::factory(), 
        'categoryId' => \App\Models\Category::factory(), 
        'status' => fake()->randomElement(['open', 'closed']),
    ];
}
 
 

}
