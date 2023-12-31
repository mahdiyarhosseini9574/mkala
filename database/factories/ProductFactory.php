<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Brand;
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
            'title' => fake()->title,
            'description' => fake()->paragraph('1'),
            'meta_description' => fake()->paragraph('3'),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
            'inventory'=>rand(1,10),
            'price'=>rand(50,5000)
        ];


    }
}
