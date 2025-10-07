<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
        $categoryIds = Category::pluck('id');

        return [
            'product_name' => fake()->sentence(rand(2, 4)),
            'product_description' => fake()->paragraphs(2, true),
            'product_price' => fake()->randomFloat(2, 10000, 5000000),
            'product_stock' => fake()->numberBetween(0, 250),
            'product_status' => fake()->boolean(90),
            'barcode' => fake()->optional()->ean13(),
            'fk_category_product' => fake()->randomElement($categoryIds),
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
