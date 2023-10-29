<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url'=> 'gfghfghjv'.rand(1,20).'.jpg',
            'size'=>rand(20,30).'.mb',
            'extension' => fake()->randomElement(['mp3','mp4','4K'])
        ];
    }
}
