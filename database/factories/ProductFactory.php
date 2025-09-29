<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->sentence(rand(2, 4)),
            'product_description' => $this->faker->paragraphs(2, true),
            'product_price' => $this->faker->randomFloat(2, 10000, 5000000),
            'product_stock' => $this->faker->numberBetween(0, 250),
            'product_status' => $this->faker->boolean(90),
        ];
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'product_status' => false,
                'product_stock' => 0,
            ];
        });
    }
}
