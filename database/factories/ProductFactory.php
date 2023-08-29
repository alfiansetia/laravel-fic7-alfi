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
            'name'          => fake()->unique()->sentence(2),
            'desc'          => fake()->text,
            // 'price'         => fake()->numberBetween(200000, 500000),
            'price'         => 10000,
            'image'         => fake()->imageUrl($width = 200, $hight = 200),
        ];
    }
}
