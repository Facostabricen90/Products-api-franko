<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_name' => fake()->word(),
            'category_description' => fake()->sentence(),
            'category_classification' => fake()->randomElement(['A', 'B', 'C']),
            'category_state' => fake()->boolean(80),
        ];
    }
}
