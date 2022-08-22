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
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'slug' => fake()->slug(),
            'price' => fake()->numberBetween(100,1000000),
            'product_image' => 'http://localhost:8000/img/chair.jpg',
            'discount' => 10,
            'stock' => 100,
            'sold' => 5,
            'detail_product' => fake()->paragraph(),
            'category_id' => fake()->numerify(1,5)
        ];
    }
}
