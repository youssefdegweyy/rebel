<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition()
    {
        return [
            'name' => fake()->name,
            'code' => generateRandomCode("product"),
            'image' => fake()->imageUrl,
            'price' => fake()->randomNumber(),
            'discount_price' => fake()->randomNumber(),
            'description' => fake()->paragraph,
            'size_one_stock' => fake()->randomNumber(),
            'size_two_stock' => fake()->randomNumber(),
            'category_id' => Category::factory(),
            'featured' => fake()->randomElement(['0', '1']),
            'status' => 1,
        ];
    }
}
